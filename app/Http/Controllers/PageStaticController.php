<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagesStatic;


class PageStaticController extends Controller
{

    public function getVeChungToi(Request $request)
    {
        $page = PagesStatic::where('s_type', 3)->first();
        // seo
        $meta_desc = "SIÊU THỊ RƯỢU NGOẠI xin gửi đến Quý Khách hàng lời Chúc mừng năm mới. Kính chúc Quý khách hàng cùng gia đình một năm mới AN KHANG – THỊNH VƯỢNG. Xin chân thành cảm ơn Quý khách hàng đã tín nhiệm, quan tâm, ủng hộ đối với các sản phẩm do SIÊU THỊ RƯỢU NGOẠI phân phối trong suốt thời gian";
        $meta_author = "SIÊU THỊ RƯỢU NGOẠI";
        $meta_keywords = "giới thiệu, gioi thieu, giới, thiệu, gioi, thieu";
        $meta_canonical = $request->url();
        // end seo
        $viewData = [
        	'page'              => $page,
            'meta_desc'         => $meta_desc,
            'meta_author'       => $meta_author,
            'meta_keywords'     => $meta_keywords,
            'meta_canonical'    => $meta_canonical,
            'title_page'        => "Về chúng tôi"
    	];

        return view('pages.aboutUs', $viewData);
    }
    
  public function getMuaHang(Request $request)
    {
        $page = PagesStatic::where('s_type', 1)->first();
        // seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        $viewData = [
        	'page'              => $page,
            'meta_desc'         => $meta_desc,
            'meta_author'       => $meta_author,
            'meta_keywords'     => $meta_keywords,
            'meta_canonical'    => $meta_canonical,
            'title_page'        => "Chính sách mua hàng"
    	];

        return view('pages.aboutUs', $viewData);
    }

    public function getGiaoNhan(Request $request)
    {
        $page = PagesStatic::where('s_type', 2)->first();
        // seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        $viewData = [
        	'page'              => $page,
            'meta_desc'         => $meta_desc,
            'meta_author'       => $meta_author,
            'meta_keywords'     => $meta_keywords,
            'meta_canonical'    => $meta_canonical,
            'title_page'        => "Chính sách bảo hành"
    	];

        return view('pages.aboutUs', $viewData);
    }
}
