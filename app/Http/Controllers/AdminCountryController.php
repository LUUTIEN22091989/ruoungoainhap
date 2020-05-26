<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RequestAdminCountry;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Country;

class AdminCountryController extends Controller
{
    public function index()
    {
        $countrys = Country::paginate(20);
        $viewData   = [
        	'countrys' => $countrys,
        ];

    	return view('admin.country.index', $viewData);
    }

    public function create()
    {
    	return view('admin.country.create');
    }

    public function store(RequestAdminCountry $request)
    {
    	$data               = $request->except('_token');
    	$data['co_name']     = $request->co_name;
    	$data['co_slug']     = Str::slug($request->co_name);
    	$data['created_at'] = Carbon::now();

        $id                 = Country::insertGetId($data);

        return redirect()->route('admin.country.index');
    }

    public function edit($id)
    {
    	$country = Country::where('id', $id)->first();

    	$viewData   = [
        	'country' => $country,
        ];

    	return view('admin.country.update', $viewData);
    }

    public function update(RequestAdminCountry $request, $id)
    {
        $country = Country::find($id);

    	$data               = $request->except('_token');
    	$data['co_name']     = $request->co_name;
    	$data['co_slug']     = Str::slug($request->co_name);
    	$data['created_at'] = Carbon::now();

        $country->update($data);

        return redirect()->route('admin.country.index');
    }

    public function delete($id)
    {
    	Country::where('id', $id)->delete();

        return redirect()->route('admin.country.index');
    }

    public function hot($id)
    {
    	$country = Country::find($id);
    	$country->co_hot =! $country->co_hot;
    	$country->save();
        return redirect()->back();
    }

    public function status($id)
    {
    	$country = Country::find($id);
    	$country->co_status =! $country->co_status;
    	$country->save();
        return redirect()->back();
    }
}
