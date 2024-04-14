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
  
}
