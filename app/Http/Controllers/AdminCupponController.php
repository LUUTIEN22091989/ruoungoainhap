<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;  // dùng cho slug
use Carbon\Carbon;// DÙNG CHO created_at
use App\Models\Cuppon;

class AdminCupponController extends Controller
{
    public function index()
    {
    	$cuppons = Cuppon::paginate(20);
		  $viewData = [
		   	'cuppons' => $cuppons
		   ];
    	return view('admin.cuppon.index', $viewData);
    }

    public function create()
    {
    	return view('admin.cuppon.create');
    }

    public function store(Request $request)
    {
    	$data                 = $request->except('_token');
    	$data['cp_slug']     = Str::slug($request->cp_name);
    	$data['created_at']   = Carbon::now();

    	$id = Cuppon::insertGetId($data);

    	return redirect()->route('admin.cuppon.index');
    }

    public function delete($id)
    {
    	$cuppon = Cuppon::find($id);
    	if ($cuppon) {
    		$cuppon->delete();
    	}
    	return redirect()->route('admin.cuppon.index');
    }
}
