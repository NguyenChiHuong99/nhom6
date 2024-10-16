<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareCartData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $cart = session('cart', []);
        $totalQuantity = 0;
    
        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }
    // dd(session('cart'));
        view()->share('totalQuantity', $totalQuantity);
        return $next($request);
    }
}
