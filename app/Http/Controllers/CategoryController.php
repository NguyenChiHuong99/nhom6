<?php

namespace App\Http\Controllers;

use App\Models\ProductsModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(Request $request){
        $category_id=$request->category_id;
        if($category_id>0){
            $products = ProductsModel::getProductsByCategory($category_id)->paginate(10);
        }else{
            $products = ProductsModel::paginate(10);
        }
        // $categories= ProductsModel::all();

        return view('category',compact('products'));
    }
    public function search(Request $request)
    {
            $keyword = $request->input('keyword');
            if (!empty($keyword)) {
                session(['search_keyword' => $keyword]);
            } else {
                session()->forget('search_keyword'); 
            }
        
        $keyword = session('search_keyword');
    
   
        $productsSearch = ProductsModel::searchProductByName($keyword);
    
       
        $products = $productsSearch->paginate(3); 
    
      
        return view('category', compact('products'))->with('keyword', $keyword);
    }
    
    
    
}
