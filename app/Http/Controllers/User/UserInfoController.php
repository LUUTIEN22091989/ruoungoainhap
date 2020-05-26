<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

use Session;


class UserInfoController extends Controller
{
   public function updateInfo()
   {
   	  return view('user.home.update_info');
   }
   public function saveInfo(Request $request)
   { 
   	   $data = $request->except('_token');
    	$user = User::find(Session::get('user_id'));
        $user->update($data);
        
        Session::flash('alert', 'Cập nhật thành công');
        return redirect()->back();
   }
}
