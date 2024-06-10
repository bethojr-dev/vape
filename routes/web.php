<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = DB::table('products')->orderByDesc('id')->get();
    return view('welcome')->with('products', $products);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('show-products',  [App\Http\Controllers\HomeController::class, 'showProducts'])->name('showProducts');

Route::get('create-product',  [App\Http\Controllers\HomeController::class, 'createProduct'])->name('createProduct');
Route::post('create-product',  [App\Http\Controllers\HomeController::class, 'storeProduct'])->name('storeProduct');

Route::post('update-product/{id}',  [App\Http\Controllers\HomeController::class, 'updateProduct'])->name('updateProduct');
Route::delete('delete-product/{id}',  [App\Http\Controllers\HomeController::class, 'deleteProduct'])->name('deleteProduct');

Route::post('/api/sales',  [App\Http\Controllers\SalesController::class, 'store']);
