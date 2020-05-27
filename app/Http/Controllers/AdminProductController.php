<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExcelExportsProduct;
use Excel;
use App\Http\Requests\RequestAdminProduct;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;

class AdminProductController extends Controller
{
	public function index(Request $request)
	{

	   $products = Product::with('category:id,c_name');
       // lọc theo tên
       if ($name = $request->name) {
           $products = Product::where('pro_name', 'like', '%'.$name.'%')->orWhere('pro_slug', 'like', '%'.Str::slug($name).'%' );
       }
       // lọc theo danh mục
       if ($category = $request->category ) {
           $products = Product::where('pro_category_id', $category);
       }

       $products = $products->orderByDesc('id')->paginate(30);
       $categories = Category::all();

	   $viewData = [
	   	'products' => $products,
        'categories' => $categories,
        'query'      => $request->query()
	   ];	

	   return view('admin.product.index', $viewData);
	}

    public function create()
    {
    	$categories = Category::select('id', 'c_slug', 'c_name')->get();
        $countrys = Country::where('co_status', 1)->select('id', 'co_name')->get();
    	$viewData = [
    		'categories' => $categories,
            'countrys'   => $countrys
    	];

    	return view('admin.product.create', $viewData);
    }

    public function store(RequestAdminProduct $request)
    {
    	$data                 = $request->except('_token', 'file');
    	$data['pro_slug']     = Str::slug($request->pro_name);
    	$data['created_at']   = Carbon::now();

    	if ($request->hasFile('pro_image')) {
    		$file               = $request->file('pro_image');
    		$fileName           = time().'_'.$file->getClientOriginalName(); 
    		$path_upload        = 'uploads/product/';
    		$request->file('pro_image')->move($path_upload,$fileName);
    		$data['pro_image'] = $path_upload.$fileName;
    	}

    	$id = Product::insertGetId($data);

        if ($id) {
             //album ảnh
           if ($request->file) {
                $this->syncAlbumProduct($request->file, $id);
            } 
        }

    	return redirect()->route('admin.product.index');
    }
    public function edit($id)
    {
    	$product = Product::find($id);
    	$categories = Category::select('id', 'c_slug', 'c_name')->get();
        $countrys = Country::where('co_status', 1)->select('id', 'co_name')->get();
        
         //láy ảnh trog album
        $images = \DB::table('products_image')->where("pi_product_id", $id)->get();

    	$viewData = [
    		'product'    => $product,
    		'categories' => $categories,
            'countrys'   => $countrys,
            'images'     => $images
    	];

    	return view('admin.product.update', $viewData);
    }

    public function update(RequestAdminProduct $request, $id)
    {
    	$product = Product::find($id);

    	$data                 = $request->except('_token', 'file');
    	$data['pro_slug']     = Str::slug($request->pro_name);
    	$data['created_at']   = Carbon::now();

    	if ($request->hasFile('pro_image')) {
    		$file               = $request->file('pro_image');
    		$fileName           = time().'_'.$file->getClientOriginalName(); 
    		$path_upload        = 'uploads/product/';
    		$request->file('pro_image')->move($path_upload,$fileName);
    		$data['pro_image'] = $path_upload.$fileName;
    	}

    	$update = $product->update($data);

        if ($update) {
             //album ảnh
           if ($request->file) {
                $this->syncAlbumProduct($request->file, $id);
            } 
        }

    	return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	if ($product) {
    		$product->delete();
    	}
    	return redirect()->route('admin.product.index');
    }

    public function hot($id)
    {
    	$product = Product::find($id);
    	$product->pro_hot =! $product->pro_hot;
    	$product->save();
        return redirect()->back();
    }

    public function status($id)
    {
    	$product = Product::find($id);
    	$product->pro_status =! $product->pro_status;
    	$product->save();
        return redirect()->back();
    }

       // album ảnh
     public function syncAlbumProduct($files, $productID)
    {
        foreach ($files as $key => $fileImages) {
            $ext = $fileImages->getClientOriginalExtension(); //lấy đuôi file
            $extend = ['png', 'jpg','jpeg', 'PNG', 'JPG'];
            if (!in_array($ext, $extend)) { // kiểm tra xem phần tử ext có thuộc mảng extend ko
                return false;
            }else {
                $filename = time().'_'.Str::slug($fileImages->getClientOriginalName()).'.'.$ext;
                $path_upload = 'uploads/product/album';
                if (!\File::exists($path_upload)) {
                    mkdir($path_upload, 0777, true);
                }  
                $fileImages->move($path_upload, $filename);

                \DB::table('products_image')->insert([
                   'pi_name' => $fileImages->getClientOriginalName(),
                   'pi_slug' => $filename,
                   'pi_product_id' => $productID,
                   'created_at' => Carbon::now()
                ]);
            }
        }
    }

    // xóa ảnh trong album ảnh click vào là xóa luôn
    public function deleteImageAlbum($imageID)
    {
        \DB::table('products_image')->where('id', $imageID)->delete();
        return redirect()->back();
    }

    // xuất excel
    public function postExportProduct(Request $request)
    {
        return Excel::download( new ExcelExportsProduct, 'product.xlsx');
    }
}
