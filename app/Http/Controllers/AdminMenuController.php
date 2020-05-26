<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAdminMenu;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Menu;

class AdminMenuController extends Controller
{
    public function index()
    {
    	$menus = Menu::paginate(10);
    	$viewData = [
    		'menus' => $menus
    	];

    	return view('admin.menu.index', $viewData);
    }

    public function create()
    {
    	return view('admin.menu.create');
    }

    public function store(RequestAdminMenu $request)
    {
    	$data               = $request->except('_token');
    	$data['mn_slug']    = Str::slug($request->mn_name);
    	$data['created_at'] = Carbon::now();

    	$id = Menu::insertGetId($data); //insertGetId À PHƯƠNG THƯC THÊM VÀO  BẢN GHI VÀ LẤY ID CỦA CỘT THEM VÀO
    	return redirect()->route('admin.menu.index');

    }

    public function edit($id)
    {
        $menu = Menu::find($id);
         return view('admin.menu.update', compact('menu'));
    }

    public function update(RequestAdminMenu $request, $id)
    {
        $menu = Menu::find($id);
        $data               = $request->except('_token'); //except là truy vấn dữ liệu nhưng bỏ đi thành phần _token
        $data['mn_slug']     = Str::slug($request->mn_name);
        $data['updated_at'] = Carbon::now();

        $menu->update($data);

        return redirect()->route('admin.menu.index');
    }

    public function delete($id)
    {
    	$menu = Menu::find($id);
    	if ($menu) {
    		$menu->delete();
    	}

    	return redirect()->back();
    }

     public function active($id) 
    {
        $menu = Menu::find($id);
        $menu->mn_status =! $menu->mn_status; // thay đổi status
        $menu->save();

        return redirect()->back();
    }

    public function hot($id) // thay đổi hot
    {
        $menu = Menu::find($id);
        $menu->mn_hot =! $menu->mn_hot;
        $menu->save();

        return redirect()->back();
    }
}
