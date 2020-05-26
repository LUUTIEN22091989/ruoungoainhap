<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Menu;
use App\Models\Product;

class NewsController extends Controller
{
    public function index(Request $request)
    {
    	// seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        $articles = Article::where('a_active', 1)->select('id', 'a_name', 'a_slug','a_avatar', 'a_description', 'created_at')->orderByDesc('id')->paginate(10);
        //sp nổi bật
        $productHot = Product::where(['pro_status' => 1, 'pro_hot' => 1])->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale')->orderByDesc('id')->limit(8)->get();

        $viewData = [
            'meta_desc'         => $meta_desc,
            'meta_author'       => $meta_author,
            'meta_keywords'     => $meta_keywords,
            'meta_canonical'    => $meta_canonical,
            'articles'          => $articles,
            'productHot'        => $productHot,
            'title_page'        => "Tin tức"
    	];
        
    	return view('pages.newsList', $viewData);
    }

}
