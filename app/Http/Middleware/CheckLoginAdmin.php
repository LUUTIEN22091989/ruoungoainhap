<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLoginAdmin
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
         $admin_id = Session::get('id');

        // nếu tồn tại tài khoản thì tiếp tục
        if ($admin_id) {
            return $next($request);
        }
            return redirect()->route('get.admin.login');
    }
}
