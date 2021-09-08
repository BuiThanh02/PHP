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

//Route::get('/', [\App\Http\Controllers\ProductController::class, 'Printf']);

Route::get('/',[ProductController::class,'Admin']);
Route::post('admin',[\App\Http\Controllers\ProductController::class,'AddProduct'])->name('store');
Route::post('/',[\App\Http\Controllers\ProductController::class,'Admin'])->name('admin');
Route::get('/',[\App\Http\Controllers\ProductController::class,'ShowProduct']);


