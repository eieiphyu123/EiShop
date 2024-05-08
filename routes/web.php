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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend အတွက် group 
Route::group(['middleware'=>['auth','role:Super Admin|Admin'],'prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('items',App\Http\Controllers\Admin\ItemController::class);
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('payments',App\Http\Controllers\Admin\PaymentController::class);
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);
});
