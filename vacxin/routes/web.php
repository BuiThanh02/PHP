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
    return view('front/dangkytiem');
});
Route::get('dangnhap', [\App\Http\Controllers\UsersController::class, 'ShowLogin']);
Route::post('dangnhap', [\App\Http\Controllers\UsersController::class, 'login']);
Route::get('dangky', [\App\Http\Controllers\UsersController::class, 'ShowRegister']);
Route::post('dangky', [\App\Http\Controllers\UsersController::class, 'Users']);
Route::get('dangkytiem', [\App\Http\Controllers\ListController::class, 'ShowVaccination']);
Route::post('dangkytiem', [\App\Http\Controllers\ListController::class, 'VaccinationList']);
Route::get('tracuu', [\App\Http\Controllers\ListController::class, 'Showtracuu']);
Route::post('tracuu/{CMND}', [\App\Http\Controllers\ListController::class, 'TraCuu']);
