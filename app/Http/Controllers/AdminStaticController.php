<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagesStatic;
use Carbon\Carbon;// DÙNG CHO created_at

class AdminStaticController extends Controller
{
     public function index()
   {
   	  $statics = PagesStatic::all();

      return view('admin.static.index', compact('statics'));
   }

   public function create()
   {
      $type = (new PagesStatic())->getType();
   	  return view('admin.static.create', compact('type'));
   }

   public function store(Request $request)
   {
   	   $data               = $request->except('_token', 's_type'); //except là truy vấn dữ liệu nhưng bỏ đi thành phần _token
       $data['created_at'] = Carbon::now();

      $id = PagesStatic::insertGetId($data); //insertGetId À PHƯƠNG THƯC THÊM VÀO  BẢN GHI VÀ LẤY ID CỦA CỘT THEM VÀO
    	
        return redirect()->route('admin.static.index');
   }

    public function edit(Request $request, $id)
   {
      $type = (new PagesStatic())->getType();
   	  $static = PagesStatic::find($id);
   	  return view('admin.static.update', compact('static', 'type'));
   }

   public function update(Request $request, $id)
   {
   	   $static = PagesStatic::find($id);
   	   $data               = $request->except('_token'); //except là truy vấn dữ liệu nhưng bỏ đi thành phần _token

    	$data['created_at'] = Carbon::now();

        $update = $static->update($data); //insertGetId À PHƯƠNG THƯC THÊM VÀO  BẢN GHI VÀ LẤY ID CỦA CỘT THEM VÀO
    	
        return redirect()->route('admin.static.index');
   }

   public function active($id)
    {
    	$static = PagesStatic::find($id);
    	$static->s_active =! $static->s_active;
    	$static->save();
        return redirect()->back();
    }

   public function delete(Request $request, $id)
   {
   	 $static = PagesStatic::find($id);
   	 if ($static) {
   	 	$static->delete();
   	 }
   	 return redirect()->route('admin.static.index');
   }
}
