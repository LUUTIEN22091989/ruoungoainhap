<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Article;
use App\Models\Category;
use App\Models\Slide;
use App\Models\Rating;
use Illuminate\Support\Str;  // dùng cho slug

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // seo
        $meta_desc = "Siêu thị rượu ngoại cao cấp là hệ thống chuyên phân phối, bán sỉ, lẻ cho các Cửa Hàng Rượu Ngoại, Rượu Tây Chính Hãng. Cam kết hàng thật 100% ,hơn 10 năm chúng tôi phục vụ bạn với sản phẩm Uy tín & chất lượng nhất. ";
        $meta_author = "Cửa Hàng Rượu ngoại cao cấp  | Siêu thị Rượu Ngoại Chính Hãng";
        $meta_keywords = "cửa hàng rượu ngoại cao cấp, cua hang ruou ngoai cao cap, cửa, hàng, rượu, ngoại, cao, cấp, cua, hang, ruou, ngoai, cap";
        $meta_canonical = $request->url();
        // end seo
        

    	$products   = Product::where('pro_status', 1)->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale', 'pro_code')->orderByDesc('id')->limit(12)->get();
        //slide
        $slides = Slide::where('sd_active', 1)->orderByDesc('sd_sort')->get();
        //bài viết
        $articles = Article::where('a_active', 1)->select('id', 'a_slug', 'a_name', 'a_avatar', 'a_description')->orderByDesc('id')->limit(4)->get();
        //sp bán chay
        $productsPay = Product::where('pro_status', 1)->where('pro_pay', '>', 0)->orderByDesc('id')->limit(18)->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale', 'pro_code')->get();
        // đánh giá
        $ratings = Rating::where('r_status', 1)->orderByDesc('id')->limit(4)->get();

        //sp theo từng danh mục
        $productsByCategory = [];
        $categories = Category::where('c_status' ,1)->get(); // lấy danh mục cha lớn
        foreach ($categories as $key => $category) {
            if ($category->c_parent_id == 0 ) {
                $ids = [$category->id];

                foreach ($categories as $child) {
                    if ($child->c_parent_id == $category->id) {
                        $ids[] = $child->id;
                    }
                }
                // gán sản phẩm theo từng danh mục cha lớn
                $productsByCategory[$key]['category'] = $category;
                $productsByCategory[$key]['products'] = Product::where('pro_status', 1)->whereIn('pro_category_id', $ids)->orderByDesc('id')->limit(12)->get();
            }
        }

        	$viewData = [
        		'products'          => $products,
                'articles'          => $articles,
                'slides'            => $slides,
                'productsPay'       => $productsPay,
                'ratings'           => $ratings,
                'productsByCategory'=> $productsByCategory,
                'meta_desc'         => $meta_desc,
                'meta_author'       => $meta_author,
                'meta_keywords'     => $meta_keywords,
                'meta_canonical'    => $meta_canonical,
                'title_page'        => "Điện tử 1989"
        	];
 

    	return view('pages.home', $viewData);
    }

    // tìm kiếm sản phẩm
    public function searchProduct(Request $request)
    {
        // seo
        $meta_desc = "Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN";
        $meta_author = "Công ty cổ phần Điện tử 1989";
        $meta_keywords = "Điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, Laptop, máy tính xách tay, phụ kiện điện thoại, tin công nghệ";
        $meta_canonical = $request->url();
        // end seo
        
    	$key = $request->key;

    	$products = Product::where('pro_status', 1)->where('pro_name', 'like', '%'.$key.'%')->orWhere('pro_slug', 'like', '%'.Str::slug($key).'%')->get();
        
        $viewData = [
                'products'       => $products,
                'meta_desc'      => $meta_desc,
                'meta_author'    => $meta_author,
                'meta_keywords'   => $meta_keywords,
                'meta_canonical' => $meta_canonical,
                'query'      => $request->query(),
                'title_page'     => "Danh sách tìm kiếm"
        ];

        return view('pages.search_products' ,$viewData);
    }
}
