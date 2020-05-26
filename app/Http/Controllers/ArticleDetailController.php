<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleDetailController extends Controller
{
    public function getArticleDetail(Request $request, $slug)
    {

    	$arraySlug = explode('-', $slug); //tách các phần tử qua dấu - của slug
    	$id = array_pop($arraySlug); // lấy phần tử cuối cùng sau khi tách
    	// seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        // 
        if ($id) {
    		$article = Article::findOrFail($id);

	        $viewData = [
	            'article'       => $article,
	            'meta_desc'         => $meta_desc,
	            'meta_author'       => $meta_author,
	            'meta_keywords'     => $meta_keywords,
	            'meta_canonical'    => $meta_canonical,
	            'title_page'        => $article->a_name
	    	];

	    	return view('pages.articleDetail', $viewData);
    	}
    }
}
