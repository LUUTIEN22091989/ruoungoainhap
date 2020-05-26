<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\RequestAdminBrand;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at

class AdminBrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(20);
        $viewData   = [
        	'brands' => $brands
        ];

    	return view('admin.brand.index', $viewData);
    }

    public function create()
    {
        $categories = Category::select('id', 'c_name')->get();
    	return view('admin.brand.create', compact('categories'));
    }

    public function store(RequestAdminBrand $request)
    {
    	$data               = $request->except('_token');
    	$data['b_name']     = $request->b_name;
    	$data['b_slug']     = Str::slug($request->b_name);
    	$data['created_at'] = Carbon::now();
    	$data['b_status']   = $request->b_status;

        if ($request->hasFile('b_avatar')) {
            $file               = $request->file('b_avatar');
            $fileName           = time().'_'.$file->getClientOriginalName(); 
            $path_upload        = 'uploads/brand/';
            $request->file('b_avatar')->move($path_upload,$fileName);
            $data['b_avatar'] = $path_upload.$fileName;
        }

        $id                 = Brand::insertGetId($data);

        return redirect()->route('admin.brand.index');
    }

    public function edit($id)
    {
        $categories = Category::select('id', 'c_name')->get();
    	$brand = Brand::where('id', $id)->first();

    	$viewData   = [
        	'brand' => $brand,
            'categories' => $categories
        ];

    	return view('admin.brand.update', $viewData);
    }

    public function update(RequestAdminBrand $request, $id)
    {
        $brand = Brand::find($id);

    	$data               = $request->except('_token');
    	$data['b_name']     = $request->b_name;
    	$data['b_slug']     = Str::slug($request->b_name);
    	$data['created_at'] = Carbon::now();
    	$data['b_status']   = $request->b_status;

        if ($request->hasFile('b_avatar')) {
            $file               = $request->file('b_avatar');
            $fileName           = time().'_'.$file->getClientOriginalName(); 
            $path_upload        = 'uploads/brand/';
            $request->file('b_avatar')->move($path_upload,$fileName);
            $data['b_avatar'] = $path_upload.$fileName;
        }

        $brand->update($data);

        return redirect()->route('admin.brand.index');
    }

    public function delete($id)
    {
    	Brand::where('id', $id)->delete();

        return redirect()->route('admin.brand.index');
    }
}
