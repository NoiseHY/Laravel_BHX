<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;
use App\Models\SanPham;

class LoaiSanPhamControllers extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $categories = LoaiSanPham::all();

    return view('admin.categories.index', ['categories'=> $categories]);
  }
}
