<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChiTietSanPham;
use App\Models\ChiTietGioHang;

use App\Models\SanPham;
use App\Models\LoaiSanPham;

class ChiTietSanPhamControllers_Users extends Controller
{

  // public function index()
  // {
  //   $details = ChiTietSanPham::all();
  //   return view("users.products.index")->with("details", $details);
  // }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $products = SanPham::find($id);

    // $category_id = $products->MaLoai;
    // $category = LoaiSanPham::find($category_id);
    $cat = SanPham::where('MaLoai', $products->MaLoai)->get();

    $info = ChiTietSanPham::find($id);
    $images = $info->HinhAnh;

    $number = ChiTietGioHang::count();

    return view("users.products.index")->with([
      "info" => $info,
      "products" => $products,
      "number" => $number,
      "images" => $images,
      // 'category' => $category,
      'cat' => $cat
    ]);
  }
}
