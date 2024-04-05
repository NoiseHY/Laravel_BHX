<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChiTietSanPham;
use App\Models\SanPham;

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
    $details = ChiTietSanPham::find($id);
    

    return view("users.products.index")->with("details", $details)->with("products", $products);
  }
}
