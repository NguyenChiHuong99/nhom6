<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function Detail(Request $request){
        $product_id = $request->product_id;
        $product = ProductsModel::find($product_id);
        return view('detail',compact('product'));
    }
}
