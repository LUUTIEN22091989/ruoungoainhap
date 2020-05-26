<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use Carbon\Carbon;// DÙNG CHO created_at
use Session;
session_start();


class RatingController extends Controller
{
    public function postRating(Request $request, $id)
    {
    	     $rating = new Rating();
    		// nếu tồn tại tài khoản đăng nhập
    		if ( Session::get('user_id') ) {
    			$rating->r_user_id = Session::get('user_id');
    		}else {
    			$rating->r_user_id = 0;
    		}

    		$rating->r_name = $request->r_name;
    		$rating->r_email = $request->r_email;
    		$rating->r_product_id  = $id; // products_id là biến name input
    		$rating->r_type      = $request->r_type; 
    		$rating->r_content     = $request->r_content ;// content_review là biến name textarea content_review
    		$rating->created_at    = Carbon::now();

    		$rating->save(); // lưu vào DB

             Session::flash('alert', 'Đánh giá của bạn đã được gửi đến quản trị viên');
             return redirect()->back();
    }
}
