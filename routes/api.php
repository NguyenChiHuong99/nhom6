<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/api/popular', function(){
//     $popularPr = ProductsModel::PopularProduct()->get();

//     // dd($popularPr);
//     return response()->json(['data' => $popularPr]);

// });
