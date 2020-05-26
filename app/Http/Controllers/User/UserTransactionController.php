<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Session;



class UserTransactionController extends Controller
{
    public function transaction(Request $request)
    {
    	$transactions = Transaction::where('tst_user_id', Session::get('user_id'));
    	//lọc theo id
    	if ($request->id) {
    		$transactions->where('id', $request->id);
    	}
    	// lọc theo trạng thái đơn hàng
            if ($status = $request->status) {
                $transactions->where('tst_status', $status);
            }

    	$transactions = $transactions->orderByDesc('id')->get();
    	$viewData     = [
    		'transactions' => $transactions
    	];

    	return view('user.home.transaction', $viewData);
    }
}
