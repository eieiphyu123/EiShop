<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('front.index');
Route::get('item/{item_id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('front.show');
Route::get('items/category/{id}',[App\Http\Controllers\FrontendController::class, 'itemCategory'])->name('items.category');

Route::get('checkout/', [App\Http\Controllers\FrontendController::class, 'checkout'])->name('front.checkout');

Route::post('orderNow', [App\Http\Controllers\FrontendController::class, 'orderNow'])->name('orderNow');

Route::get('profile/details/{user}', [App\Http\Controllers\FrontendController::class, 'profileDetail'])->name('profile.detail');
Route::put('profile/update/{user}', [App\Http\Controllers\FrontendController::class, 'profileupdate'])->name('profile.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend အတွက် group
Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){

    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('items',App\Http\Controllers\Admin\ItemController::class);
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('payments',App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);

    Route::get('orders',[App\Http\Controllers\Admin\orderController::class, 'index'])->name('orders.index');
    Route::get('orderAccept',[App\Http\Controllers\Admin\orderController::class, 'orderAccept'])->name('orders.accept');
    Route::get('orderComplete',[App\Http\Controllers\Admin\orderController::class, 'orderComplete'])->name('orders.comptete');

    Route::get('orders/{voucherNo}',[App\Http\Controllers\Admin\orderController::class, 'detail'])->name('orders.detail');
    Route::put('orders/{voucherNo}',[App\Http\Controllers\Admin\orderController::class, 'status'])->name('orders.status');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
