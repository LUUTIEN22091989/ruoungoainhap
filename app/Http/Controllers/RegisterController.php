<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use Carbon\Carbon;// DÙNG CHO created_at
use App\User;
use Session;
session_start();

class RegisterController extends Controller
{
    public function getFormRegister(Request $request)
    {
        // seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        $viewData = [
                'meta_desc'         => $meta_desc,
                'meta_author'       => $meta_author,
                'meta_keywords'     => $meta_keywords,
                'meta_canonical'    => $meta_canonical,
                'title_page'         => "Đăng ký" 
            ];
        
    	return view('pages.register', $viewData);
    }

    public function postRegister(RequestRegister $request)
    {
    	$data = $request->except('_token');
        $data['password']   = md5($data['password']);
        $data['created_at'] = Carbon::now();

        $id = User::insertGetId($data); // insert vào bảng users và lấy  luôn id

        if ($id) {
            Session::flash('alert', 'Đăng ký thành công, mời đăng nhập');
            return redirect()->route('get.login');
        }
            Session::flash('alert', 'Đăng ký thất bại');
            return redirect()->back();
    }
}
