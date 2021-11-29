<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any','.*');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products',[App\Http\Controllers\ProductController::class,'index'])->name('index');
Route::post('/store-product',[App\Http\Controllers\ProductController::class,'store'])->name('store');
Route::post('/update-product',[App\Http\Controllers\ProductController::class,'update'])->name('update');
Route::get('/delete-product/{id}',[App\Http\Controllers\ProductController::class,'delete'])->name('delete');
Route::get('edit-product/{id}',[App\Http\Controllers\ProductController::class,'edit']);

