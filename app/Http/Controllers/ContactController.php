<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;// DÙNG CHO created_at
use Session;
session_start();



class ContactController extends Controller
{
    public function index(Request $request)
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
            'title_page'        => "Liên hệ"
    	];
    	return view('pages.contact', $viewData);
    }

    public function store(Request $request)
    {
    	$data               = $request->except('_token');
        $data['created_at'] = Carbon::now();

        Contact::insert($data);

        Session::flash('alert', 'Chúng tôi sẽ phản hồi lại sớm nhất cho bạn. Xin cảm ơn');
        return redirect()->back();
    }
}
