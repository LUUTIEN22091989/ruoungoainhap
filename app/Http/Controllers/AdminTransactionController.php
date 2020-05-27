<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExportsTransaction;
use Excel;
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Transaction;
use App\Models\Order;
use PDF; //IN RA PDF

class AdminTransactionController extends Controller
{
    public function index(Request $request)
    {
    	// lấy danh sách các đơn hàng
    	$transactions = Transaction::whereRaw(1);
        //lọc theo id
        if ($request->id) {
            $transactions->where('id', $request->id);
        }
        //lọc theo email
        if ($email = $request->email) {
            $transactions->where('tst_email', 'like', '%'.$email.'%');
        }
        //lọc theo phân loại khách hàng
          if ($type = $request->type) {
                if ($type == 1) {
                    $transactions->where('tst_user_id', '<>',0);
                }else {
                    $transactions->where('tst_user_id',0);
                }
            }
          // lọc theo trạng thái đơn hàng
            if ($status = $request->status) {
                $transactions->where('tst_status', $status);
            }
        //lọc theo ngày
            if ($date = $request->date ) {
                $transactions->whereDate('created_at', $date);
            }

        $transactions = $transactions->orderByDesc('id')->paginate(10);

    	$viewData     = [
    		'transactions' => $transactions,
            'query'        => $request->query()
    	];

    	return view('admin.transaction.index', $viewData);
    }

     public function delete($id)
    {
    	$transaction = Transaction::find($id);

    	if ($transaction) {
    		$transaction->delete();
    		//xóa luôn khỏi bảng orders
    		\DB::table('orders')->where('od_transaction_id', $id)->delete();
    	}
    	return redirect()->back();

    }

    public function getTransactionShow($id) // chi tiêt đơn hàng
    {
        $orders = Order::with('product:id,pro_name,pro_slug,pro_image')->where('od_transaction_id', $id)->get();

        return view('admin.transaction.show', compact('orders'));
    }

    // xử lý trạng thái bàn giao hay chưa bàn giao, hủy
    public function getAction($action, $id)
    {
       if ($id) {
              $orders = Order::where('od_transaction_id', $id)->get();
              $transaction = Transaction::find($id);

              switch ($action) {
                  case 'success': //giao hangf thanh cong
                    $transaction->tst_status = 2;
                    foreach ($orders as $value) {
                        $id = $value->od_product_id;
                        $od_qty = $value->od_qty;
                        // Tăng cột pro_pay của các sản phẩm trong đơn lên 1 đơn vị 
                        \DB::table('products')->where('id', $id)->increment('pro_pay');
                        // Tự động giảm số lượng tồn kho pro_number khi thanh toán
                        \DB::table('products')->where('id', $id)->decrement('pro_number', $od_qty);
                    }
                      break;
                  case 'cancle': // nếu hủy
                    $transaction->tst_status = 3;
                      break;
              }

              $transaction->save();
          }   

        return redirect()->back();
    }

     public function deleteOrderItem($id) // xóa sp đặt mua trong từng đơn hàng bên show
    {
         $order = Order::find($id);
            if ($order) {
                $money = $order->od_qty*$order->od_price;

                \DB::table('transactions')->where('id', $order->od_transaction_id)->decrement('tst_total_money', $money); // sau khi xóa sp khỏi giỏ hàng thì tổng tiền thanh toán phải trừ đi số tiền sp đã bị xóa
                $order->delete();

                return redirect()->back();
            }
    }

    // in đơn hàng pdf
    public function printTransaction($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_transaction($id));

        return $pdf->stream();
    }

    public function print_transaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::with('product:id,pro_name,pro_slug,pro_image,pro_price,pro_sale')->where('od_transaction_id', $id)->get();

        $output = '' ;
        $output.='
        <style>
           body{
              font-family: Dejavu Sans;
           }
        </style>
        <h3><center>Thông tin đơn hàng '.$transaction->tst_name.'</center></h3>
        <p>Ngày in đơn: '.Carbon::now().'</p>
        <p>Mã đơn: '.$transaction->tst_code.'</p>
        <p>Khách hàng: '.$transaction->tst_name.'</p>
        <p>Số điện thoại: '.$transaction->tst_phone.'</p>
        <p>Nơi nhận: '.$transaction->tst_address.'</p>
        <p>Mã giảm giá: '.$transaction->tst_code_cuppon.'</p>
        <p>Ghi chú: '.$transaction->tst_note.'</p>
        <hr>';
        foreach ($orders as $item) {
            $output.='
                <p>Sản phẩm: '.$item->product->pro_name.' - Số lượng '.$item->od_qty.'</p>
                <p>Đơn giá: '.number_format(($item->product->pro_price*(100-$item->product->pro_sale))/100).'đ'.'</p>
                <p>Thành tiền: '.number_format($item->od_price).'đ'.'</p><hr>';
        }
        $output.='
        <h3>Thanh toán: '.number_format($transaction->tst_total_money).'đ'.'</h3>
        <h3>Người giao/Ngày giao: </h3>';

                return $output;

    }
    
    // end pdf
    // 
    // xuất dữ liệu ra excel
    public function postExportTransaction(Request $request)
    {
        return Excel::download( new ExcelExportsTransaction, 'don-hang.xlsx');
    }
}
