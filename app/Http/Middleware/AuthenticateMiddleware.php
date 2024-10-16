<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::id()==null){
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Bạn phải đăng nhập để sử dụng chức năng này!',
                'icon' => 'error'
            ];
          
            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
               
            return redirect()->route('loginAdmin');
        }
        return $next($request);
    }
}
