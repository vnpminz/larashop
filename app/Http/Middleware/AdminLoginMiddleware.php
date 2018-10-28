<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->permission ==1)
            {
                return $next($request);
            }
            elseif($user->permission == 2)
            {
                return $next($request);
            }
            elseif($user->permission == 3)
            {
                return $next($request);
            }
            else
            {
                return redirect('admin/login')->with('thongbao','Tài khoản này không được phép truy cập!');
            }
        }
        else
        {
            return redirect('admin/login')->with('thongbao','Bạn chưa đăng nhập!');
        }
    }
}