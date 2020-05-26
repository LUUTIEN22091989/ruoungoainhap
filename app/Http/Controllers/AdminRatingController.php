<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;

class AdminRatingController extends Controller
{
    public function index()
    {
    	$ratings = Rating::where('r_status', 1)->with('product:id,pro_name,pro_slug')->orderByDesc('id')->paginate(10);

    	$viewData = [
    		'ratings' => $ratings
    	];

    	return view('admin.rating.index', $viewData);
    }

    public function delete($id)
    {
    	$rating = Rating::find($id);
    	if ($rating) {
	    	$rating->delete();
    	} 

    	return redirect()->route('admin.rating.index');
    }

    public function active($id)
    {
        $rating = Rating::find($id);
        $rating->r_status =! $rating->r_status;
        $rating->save();
        return redirect()->back();
    }
}
