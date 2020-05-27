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
        $meta_desc = "Tin tức  | Siêu thị Rượu Ngoại Chính Hãng";
        $meta_author = "Siêu thị Rượu Ngoại Chính Hãng";
        $meta_keywords = "Tin tức rượu ngoại";
        $meta_canonical = $request->url();
        // end seo
        $articles = Article::where('a_active', 1)->select('id', 'a_name', 'a_slug','a_avatar', 'a_description', 'created_at')->orderByDesc('id')->paginate(6);
        //sp đang nổi bật
        $productHot = Product::where(['pro_status' => 1, 'pro_hot' => 1])->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale')->orderByDesc('id')->limit(12)->get();
        //show tin tức nổi bật
            $articlesHot = Article::where(['a_active'=> 1, 'a_hot' => 1])->select('id', 'a_name', 'a_slug', 'a_avatar', 'created_at')->orderByDesc('id')->limit(12)->get();

        $viewData = [
            'meta_desc'         => $meta_desc,
            'meta_author'       => $meta_author,
            'meta_keywords'     => $meta_keywords,
            'meta_canonical'    => $meta_canonical,
            'articles'          => $articles,
            'productHot'        => $productHot,
            'articlesHot'       => $articlesHot,
            'title_page'        => "Tin tức"
    	];
        
    	return view('pages.newsList', $viewData);
    }

}
