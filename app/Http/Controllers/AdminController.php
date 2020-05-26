<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\RequestAdmin;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at

class AdminController extends Controller
{
    public function index()
    {

        $admins = Admin::paginate(20);
        $viewData   = [
        	'admins' => $admins,
        ];

    	return view('admin.admin.index', $viewData);
    }

    public function create()
    {
    	return view('admin.admin.create');
    }

    public function store(RequestAdmin $request)
    {
    	$data               = $request->except('_token');
    	$data['ad_password']   = md5($data['ad_password']);
        $data['created_at'] = Carbon::now();

        $id                 = Admin::insertGetId($data);

        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
    	$admin = Admin::where('id', $id)->first();

    	$viewData   = [
        	'admin' => $admin,
        ];

    	return view('admin.admin.update', $viewData);
    }
    public function update(RequestAdmin $request, $id)
    {
        $admin = Admin::find($id);

    	$data               = $request->except('_token');
    	$data['ad_password']   = md5($data['ad_password']);
        $data['updated_at'] = Carbon::now();

        $admin->update($data);

        return redirect()->route('admin.index');
    }

    public function delete($id)
    {
    	Admin::where('id', $id)->delete();

        return redirect()->route('admin.index');
    }

    public function active($id)
    {
    	$admin = Admin::find($id);
    	$admin->ad_active =! $admin->ad_active;
    	$admin->save();
        return redirect()->back();
    }
}
