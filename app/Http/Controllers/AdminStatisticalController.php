<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Order;

class AdminStatisticalController extends Controller
{
    public function index()
    {
    	// tổng đơn hàng
    	$totalTransaction = \DB::table('transactions')->select('id')->count();
    	// tổng số thành viên
        $totalUser= \DB::table('users')->select('id')->count();
        // tổng số sản phẩm
        $totalProducts= \DB::table('products')->select('id')->count();
        // tổng đánh giá
        $totalRatings= \DB::table('ratings')->select('id')->count();
        // danh sách đơn hàng mới nhất
        $transactionsNew = Transaction::orderByDesc('id')->limit(10)->get();
        //sp bán chay
        $topPayProducts = Product::where('pro_status', 1)->where('pro_pay', '>', 0)->orderByDesc('pro_pay')->limit(20)->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale', 'pro_pay')->get();    
            // lấy số lượng bán được bao nhiêu của sp bán chạy 
            $orderQty = [];   
            foreach ($topPayProducts as $key => $products) {
                     // lấy mảng các id sp bán chạy
                    $ids = [$products->id];
                    // lấy các orders tương ứng vs đơn hàng đã giao
                    $orders = \DB::table('orders')->join('transactions', 'orders.od_transaction_id', '=', 'transactions.id')->where('tst_status', 2);
                    // lấy mảng số lượng bán được của các sp đã giao
                    $orderQty[$key] = $orders->whereIn('od_product_id', $ids)->groupBy('od_product_id')->sum('od_qty');
            }
        //end sp bán chạy


        // doanh thu theo tháng ứng vs status = 2 đã bàn giao
        $revenueTransactionMonth = Transaction::where('tst_status', 2)->whereMonth('created_at', date('m'))->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))->groupBy('day')->get();
        // dd($revenueTransactionMonth);
        // foreach ($revenueTransactionMonth as $key => $value) {
        //     $totalRevenue = sum($value->totalMoney);
        //     dd($totalRevenue);
        // }
        // doanh thu theo tháng ứng vs trạng thái tiếp nhận
        $revenueTransactionMonthDefault = Transaction::where('tst_status', 1)->whereMonth('created_at', date('m'))->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))->groupBy('day')->get();
        // doanh thu ứng vs trạng thái hủy bỏ
        $revenueTransactionMonthCancle = Transaction::where('tst_status', 3)->whereMonth('created_at', date('m'))->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))->groupBy('day')->get();

    	$viewData = [
    		'totalTransaction' => $totalTransaction,
    		'totalUser'        => $totalUser,
    		'totalProducts'    => $totalProducts,
    		'totalRatings'     => $totalRatings,
    		'transactionsNew'  => $transactionsNew,
    		'topPayProducts'    => $topPayProducts,
    		'orderQty'         => $orderQty,
            'revenueTransactionMonth' => $revenueTransactionMonth,
            'revenueTransactionMonthDefault' => $revenueTransactionMonthDefault,
            'revenueTransactionMonthCancle'  => $revenueTransactionMonthCancle
    	];

    	return view('admin.statistical.index', $viewData);
    }
}
