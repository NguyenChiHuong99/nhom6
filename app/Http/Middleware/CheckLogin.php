<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            $successData = [
                'title' => 'Thất bại!',
                'text' => 'Bạn cẩn đăng nhập để đặt hàng!',
                'icon' => 'error'
            ];
          
            // Đặt dữ liệu vào session
            session(['success_data' => $successData]);
            // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
            return redirect()->route('loginUser');
        }
        return $next($request);
    }
}
