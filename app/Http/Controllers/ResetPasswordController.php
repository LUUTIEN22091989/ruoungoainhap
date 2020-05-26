<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequestNewPassword;
use Carbon\Carbon;// DÙNG CHO created_at
use User;
use DB;
use Session;
session_start();

class ResetPasswordController extends Controller
{
    public function getResetPassword(Request $request)
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
            'title_page'        => "Quên mật khẩu"
    	];
    	return view('pages.resetPassword', $viewData);
    }

    public function saveNewPass(UserRequestNewPassword $request)
    {
        $email = $request->email;
        $user =  \DB::table('users')->where('email', $email)->first();

        if($user){
            $password = md5($request->passwordNew);
            
            $sql = "UPDATE users SET password = ? WHERE email = ? ";

            $results = DB::update($sql, [
               $password, $email
            ]);

            if ($results) {             
                Session::flash('alert', 'Cập nhật thành công, mời đăng nhập');
                return redirect()->back();
            }

                Session::flash('alert', 'Cập nhật thất bại');
                return redirect()->back();

          }
          Session::flash('alert', 'Email không tồn tại');
          return redirect()->back();
    }

}
