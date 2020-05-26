<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at

class AdminHomeFrontendController extends Controller
{
    public function index()
    { 
    	$homes = Home::paginate(10);
        $viewData   = [
        	'homes' => $homes
        ];

    	return view('admin.home-frontend.index', $viewData);
    }

    public function create()
    {
    	return view('admin.home-frontend.create');
    }

    public function store(Request $request)
    {
    	$data               = $request->except('_token');
    	$data['created_at'] = Carbon::now();

        if ($request->hasFile('logo')) {
            $file               = $request->file('logo');
            $fileName           = time().'_'.$file->getClientOriginalName(); 
            $path_upload        = 'uploads/home-frontend/';
            $request->file('logo')->move($path_upload,$fileName);
            $data['logo'] = $path_upload.$fileName;
        }

        $id                 = Home::insertGetId($data);

        return redirect()->route('admin.home-frontend.index');
    }

    public function edit($id)
    {
    	$home = Home::where('id', $id)->first();

    	$viewData   = [
        	'home' => $home,
        ];

    	return view('admin.home-frontend.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $home = Home::find($id);

    	$data               = $request->except('_token');
    	$data['updated_at'] = Carbon::now();
        if ($request->hasFile('logo')) {
            $file               = $request->file('logo');
            $fileName           = time().'_'.$file->getClientOriginalName(); 
            $path_upload        = 'uploads/home-frontend/';
            $request->file('logo')->move($path_upload,$fileName);
            $data['logo'] = $path_upload.$fileName;
        }

        $home->update($data);

        return redirect()->route('admin.home-frontend.index');
    }

    public function delete($id)
    {
    	Home::where('id', $id)->delete();

        return redirect()->route('admin.home-frontend.index');
    }

    public function status($id)
    {
    	$home = Home::find($id);
    	$home->status =! $home->status;
    	$home->save();
        return redirect()->back();
    }
}
