<?php

use App\Http\Controllers\ChiTietSanPhamControllers;
use App\Http\Controllers\GioHangControllers;
use App\Http\Controllers\KhachHangControllers;
use App\Http\Controllers\NguoiDungControllers;
use App\Http\Controllers\SanPhamControllers;
use App\Http\Controllers\TrangChuControllers;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\TrangCaNhanControllers;
use App\Http\Controllers\LoaiSanPhamControllers;
use App\Http\Controllers\HoaDonControllers_users;
use App\Http\Controllers\HoaDonControllers;


use App\Http\Controllers\ChiTietSanPhamControllers_Users;
use App\Http\Controllers\LoaiSanPhamControllers_users;
use App\Models\LoaiSanPham;
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

// Route::get('/login', function(){
//     return view('login.login');
// });

// Route::get('/cart', function(){
//     return view('users.cart.index');
// });

// Route::get('pay', function(){
//     return view('users.pay.index');
// });



Route::resource("/users", NguoiDungControllers::class);
Route::resource("/products", SanPhamControllers::class);
Route::resource("/home", TrangChuControllers::class);

Route::resource("/login", LoginControllers::class);
Route::post('/logout', [LoginControllers::class, 'logout'])->name('logout');

Route::resource("/profile", TrangCaNhanControllers::class);
Route::resource('/customer', KhachHangControllers::class);

Route::resource('/category', LoaiSanPhamControllers_users::class);
Route::get('/fil/{id}/{name}/{cat_id}', [LoaiSanPhamControllers_users::class, 'fil'])->name('fil');

Route::resource('/categories', LoaiSanPhamControllers::class);

Route::resource("/cart", GioHangControllers::class);
Route::post('/cart/{user_id}/{product_id}/{number}', [GioHangControllers::class, 'store'])->name('cart.add');

Route::resource("/details", ChiTietSanPhamControllers_Users::class);

Route::resource('/info', ChiTietSanPhamControllers::class);

Route::resource('/pay', HoaDonControllers_users::class);
Route::post('/ok/{id}', [HoaDonControllers::class, 'ok'])->name('ok');


Route::resource('/adminPay', HoaDonControllers::class);
