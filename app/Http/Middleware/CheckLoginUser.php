<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $user_id = Session::get('user_id');

        // nếu tồn tại tài khoản thì tiếp tục
        if ($user_id) {
            return $next($request);
        }
            return redirect()->route('get.home');
    }
}
