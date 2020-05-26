<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
session_start();


class LoginController extends Controller
{
    public function getFormLogin(Request $request)
    {
        // seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        $viewData = [
            'meta_desc'      => $meta_desc,
            'meta_author'    => $meta_author,
            'meta_keywords'   => $meta_keywords,
            'meta_canonical' => $meta_canonical,
            'title_page'     => "Đăng nhập"
        ];

    	return view('pages.login', $viewData);
    }

    public function postLogin(Request $request)
    {
    	$email = $request->email;
        $password = md5($request->password);
        
        $user = User::where('email',$email)->where('password',$password)->first();
       
        if($user){
            Session::put('user_id',$user->id); // check tkhoan có đăng nhập bên trang layoust
            Session::put('user_name',$user->name);
            Session::put('user_email',$user->email);
            Session::put('user_phone',$user->phone);

            return redirect()->route('get.home');
        }else{
            return redirect()->back();
        }

    }

    public function getLogout() // Đăng xuất
    {
        Session::flush();
        return redirect()->route('get.home');
    }
}
