<?php

use App\Http\Controllers\NguoiDungControllers;
use App\Http\Controllers\SanPhamControllers;
use App\Http\Controllers\TrangChuControllers;


use App\Http\Controllers\ChiTietSanPhamControllers_Users;

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

Route::get('/admin', function () {
    return view('Admin/home');
});

// Route::get('/home', function () {
//     return view('/users/home/layout');
// });

Route::resource("/users", NguoiDungControllers::class);
Route::resource("/products", SanPhamControllers::class);
Route::resource("/home", TrangChuControllers::class);

Route::resource("/details", ChiTietSanPhamControllers_Users::class);