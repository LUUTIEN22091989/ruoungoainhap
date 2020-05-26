<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Article;

class ProductDetailController extends Controller
{
    public function getProductDetail(Request $request, $slug)
    {
    	$arraySlug = explode('-', $slug); //tách các phần tử qua dấu - của slug
    	$id = array_pop($arraySlug); // lấy phần tử cuối cùng sau khi tách

    	if ($id) {
    		$product = Product::findOrFail($id);
            $ratings = Rating::where(['r_status' => 1, 'r_product_id' => $id ])->orderByDesc('id')->limit(10)->get();
            // show sp nổi bật
            $productsHot = Product::where(['pro_status'=> 1, 'pro_hot' => 1])->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale', 'pro_code')->orderByDesc('id')->limit(12)->get();
            //show tin tức nổi bật
            $articlesHot = Article::where(['a_active'=> 1, 'a_hot' => 1])->select('id', 'a_name', 'a_slug', 'a_avatar', 'created_at')->orderByDesc('id')->limit(12)->get();
                // seo
            $meta_desc = $product->meta_desc;
            $meta_author = "Công ty cổ phần Điện tử 1989";
            $meta_keywords = $product->meta_desc;
            $meta_canonical = $request->url();
            // end seo

    		$viewData = [
    			'product' => $product,
    			'productSuggests' => $this->getProductSuggests($product->pro_category_id, $id),//sp cùng danh mục
                'productsHot'    => $productsHot,
                'ratings'        => $ratings,
                'articlesHot'    => $articlesHot,
                'meta_desc'      => $meta_desc,
                'meta_author'    => $meta_author,
                'meta_keywords'   => $meta_keywords,
                'meta_canonical' => $meta_canonical,
                'title_page' => $product->pro_name
    		];

    		return view('pages.productDetail', $viewData);
    	}

    	    return redirect()->route('get.home');
    }

      // SẢN PHẨM CÙNG DANH MỤC
    public function getProductSuggests($categoryID, $id)
    {
        //SHOW danh sách sp ra trang danh sách
        $products   = Product::whereNotIn('id', [$id]);

        $products   = $products->where(['pro_status' => 1, 'pro_category_id' => $categoryID ])->select('id', 'pro_name', 'pro_slug','pro_sale', 'pro_image', 'pro_price')->paginate(12);

        return $products;
    }
}
