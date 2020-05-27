<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;
use App\Models\Home;

class ProductByCategoryController extends Controller
{
    public function getProductByCategory(Request $request, $slug)
    {
            
        $arraySlug = explode('-', $slug); //tách các phần tử qua dấu - của slug
        $id        = array_pop($arraySlug); // lấy phần tử cuối cùng sau khi tách
        $category  = Category::where(['id' => $id])->first(); // lấy danh mục click vào
        if ($category) {

            $products  = Product::where(['pro_status' => 1, 'pro_category_id' => $id ]);
            $categories= Category::all();
            $_category = Category::where(['c_parent_id' => $id])->get(); // lấy danh mục cấp 2
            $countrys = Country::where('co_status', 1)->select('id', 'co_name')->get(); // lấy xuất xứ
            // sp đang khuyến mãi 
            $productsSale = Product::where('pro_status', 1)->where('pro_sale', '>', 0)->orderByDesc('pro_sale')->limit(12)->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale', 'pro_code')->get();
      
             //lấy sản phẩm theo từng danh mục
            if ($category) {
                $ids = [];
                foreach($categories as $key => $item) {
                        if($item->id == $category->id) {
                            $ids[] = $category->id;

                            foreach ($categories as $child) {
                                if ($child->c_parent_id == $category->id) {
                                    $ids[] = $child->id; // thêm phần tử vào mảng
                                }
                            }
                        }
                    }
                
                    // step 2 : lấy list sản phẩm theo thể loại
                $products = Product::whereIn('pro_category_id' , $ids);
            }        
            //lọc theo từng danh mục rượu vang
            if( $cat = $request->ruou_vang){
                    $arraySlug = explode('-', $cat); //tách các phần tử qua dấu - của slug
                    $cat_id = array_pop($arraySlug); // lấy phần tử cuối cùng sau khi tách
                    $products->where('pro_category_id', $cat_id);
            }

            // bộ lọc
            //lọc theo giá
            if ($request->gia) { // tìm theo giá
                $price = $request->gia;
                if ($price == 9 ) {
                     $products->where('pro_price', '<', 500000);
                }elseif($price == 8){
                     $products->where('pro_price', '>', 4000000 );
                }else{
                    $products->where([
                    ['pro_price', '>=', 500000 * $price],
                    ['pro_price', '<', (500000 * $price) + 500000 ]
                    ]);
                }
            }
            //lọc theo dung tích
            if ($request->dung_tich) { // tìm theo giá
                $dungTich = $request->dung_tich;
                if ($dungTich == 5 ) {
                     $products->where('pro_capacity', '>', 750);
                }elseif ($dungTich == 6) {
                    $products->where('pro_capacity', '<', 650);
                }
                else{
                    $products->where('pro_capacity', (550 + ($dungTich * 50 )) );
                }
            }
            //theo nồng độ
            if ($request->nong_do) { // tìm theo giá
                $nongDo = $request->nong_do;
                if ($nongDo == 5) {
                    $products->where('pro_concentration', '<' , 10 );
                }else {
                    $products->where([
                        ['pro_concentration', '>=', 10 * $nongDo ],
                        ['pro_concentration', '<', 10 + ($nongDo * 10) ],
                    ]);
                }
            }
            //theo xuất xứ
            if ($request->xuat_xu) { // tìm theo giá
                $xuatXu = $request->xuat_xu;
                $products->where('pro_country_id', $xuatXu );
            }

            // seo
            $meta_desc      = $category->meta_desc;
            $meta_author    = $category->c_name;
            $meta_keywords  = $category->meta_keywords;
            $meta_canonical = $request->url();
            // end seo

            $products = $products->select('id', 'pro_name', 'pro_slug', 'pro_image', 'pro_price', 'pro_sale')->orderByDesc('id')->paginate(24);
            $viewData = [
                'category'       => $category,
                '_category'      => $_category,
                'products'       => $products,
                'productsSale'     => $productsSale,
                'countrys'       => $countrys,
                'meta_desc'      => $meta_desc,
                'meta_author'    => $meta_author,
                'meta_keywords'  => $meta_keywords,
                'meta_canonical' => $meta_canonical,
                'query'          => $request->query(),
                'title_page'     => $category->c_name
            ];
            return view('pages.productByCategory', $viewData); 
        }else {
            $home = Home::where('status', 1)->first();
            return view('pages.404', compact('home'));
        }
        
    }
}