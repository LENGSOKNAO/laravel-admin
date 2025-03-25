<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/deshborad', function(){
    return view('deshborad');
});

Route::get('/product', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/men', [ProductController::class, 'men'])->name('products.men');
Route::get('/product/women', [ProductController::class, 'women'])->name('products.women');
Route::get('/product/kids', [ProductController::class, 'kids'])->name('products.kids');
Route::get('/product/shoes', [ProductController::class, 'shoes'])->name('products.shoes');
Route::get('/product/clothing', [ProductController::class, 'clothing'])->name('products.clothing');
Route::get('/product/t_shirt', [ProductController::class, 't_shirt'])->name('products.t_shirt');
Route::get('/product/terry', [ProductController::class, 'terry'])->name('products.terry');
Route::get('/product/pant', [ProductController::class, 'pant'])->name('products.pant');
Route::get('/product/basketball_jersey', [ProductController::class, 'basketball_jersey'])->name('products.basketball_jersey');
Route::get('/product/sport', [ProductController::class, 'sport'])->name('products.sport');
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product', [ProductController::class, 'store'])->name('products.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('products.show');  