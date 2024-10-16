<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('category')->group(function () {
    Route::any('/search', [CategoryController::class, 'search'])->name('search');
    Route::get('/{category_id}', [CategoryController::class, 'list'])->name('category');
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('auth/google/', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Auth::routes(['verify' => true]);
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
     ->middleware(['signed'])
     ->name('verification.verify');

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])
     ->name('verification.notice');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login', [LoginController::class, 'login'])->name('loginUser');
Route::get('/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot');
Route::post('/forgot', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'LoginPost1'])->name('loginpost');

Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');




Route::get('/profile', [LoginController::class, 'profile'])->name('profile');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'RegisterPost'])->name('register');
Route::get('/detail/{product_id}', [ProductDetailController::class, 'Detail'])->name('detail');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'checkoutPost'])->name('cartPost')->middleware('checkLogin');
Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.add');

Route::delete('/cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.updatecart');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::post('/cart/update', [CartController::class, 'updateCartCount'])->name('cart.updateicon');
// web.php
Route::get('/api/cart-count', [CartController::class, 'getCartCount']);
// web.php

Route::get('/paypal/success', [CartController::class, 'successPayment'])->name('paypal.success');
Route::get('/paypal/cancel', [CartController::class, 'cancelPayment'])->name('paypal.cancel');

Route::get('/orders/{id}', [CartController::class, 'show'])->name('ordersDetails');
Route::post('/orders/cancel/{id}', [CartController::class, 'cancel'])->name('ordersCancel');
Route::get('/tracking', [CartController::class, 'tracking'])->name('tracking');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/confirmation', [CartController::class, 'OrderConfirmation'])->name('confirmation');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blogdetail', [BlogController::class, 'blogdetail'])->name('blogdetail');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin'])->name('dashboard')->middleware('dashboard');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::get('/order', [AdminController::class, 'order'])->name('order');
    Route::get('/orderDetail/{id}', [AdminController::class, 'orderDetail'])->name('orderDetail');
    Route::delete('/orders/{id}', [AdminController::class, 'destroy'])->name('order.destroy');
    Route::put('/order/{id}', [AdminController::class, 'updateStatus'])->name('order.updateStatus');
    Route::post('/orders/confirm-payment', [AdminController::class, 'confirmPayment']);
    Route::post('/order/{id}/update-payment-status', [AdminController::class, 'updatePaymentStatus'])->name('order.updatePaymentStatus');
    Route::get('/orders/{id}/print', [AdminController::class, 'printInvoice'])->name('admin.orders.print');

    Route::post('/loginAdmin', [AdminController::class, 'login'])->name('login');
    Route::get('/loginAdmin', [AdminController::class, 'loginAdmin'])->name('loginAdmin')->middleware('login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logoutAdmin');
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::post('/addproducts', [AdminController::class, 'addproducts'])->name('addproducts');
    Route::delete('/product/{id}', [AdminController::class, 'delete'])->name('product');
    Route::patch('/update-trending/{id}', [AdminController::class, 'updateTrending'])->name('update-trending');
    Route::get('/products/{id}/edit', [AdminController::class, 'editproduct'])->name('edit');
    Route::put('/products/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('/search', [AdminController::class, 'search'])->name('search');
});
Route::prefix('api')->group(function () {
    Route::get('/comments/product/{product_id}', [CommentController::class, 'product']);
    Route::resource('/comments', CommentController::class);
    Route::resource('/cart', CartController::class);
});
