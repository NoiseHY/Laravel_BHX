<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Giohang;
use App\Models\ChiTietGioHang;

class GioHangControllers extends Controller
{
  /**
   * Display the specified resource.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */

  public function show($id)
  {
    $cart = Giohang::find($id);

    $cartId = $cart->MaGioHang;

    $cartItems = ChiTietGioHang::where('MaGioHang', $cartId)->get();

    return view('users.cart.index')->with('cartItems', $cartItems);
  }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   * @param  int  $user_id
   * @param  int  $products_id
   */
  public function store($user_id, $products_id)
  {
    $cart = Giohang::find($user_id);

    $cartID = $cart->MaGioHang;

    $number = 1;

    $input = [
      'MaGioHang' => $cartID,
      'MaSanPham' => $products_id,
      'SoLuong' => $number,
    ];

    ChiTietGioHang::create($input);

    return redirect()->back()->with('message', 'Thêm vào giỏ hàng thành công!');
  }
}
