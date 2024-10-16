<?php

namespace App\Http\Controllers;

use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $trendingProducts = ProductsModel::trendingProducts()->orderBy('created_at', 'desc')->paginate(8);
        $dmhot = CategoriesModel::dmhot()->get();
        $popularPr = ProductsModel::ViewPr()->get();
        $cart = session('cart', []);
        $totalQuantity = 0;

        foreach ($cart as $item) {
            $totalQuantity += $item['quantity'];
        }
        return view('home', compact('trendingProducts', 'dmhot', 'popularPr', 'totalQuantity'));
    }
    // public function popularProduct()
    // {
    //     $response = Http::get(url('/api/popular'));
    //     $popularPr = $response->json()['data'];
    // }

    public function contact()
    {
        return view('contact');
    }
}
