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

  public function show($id, Request $request)
  {
    $cart = Giohang::find($id);

    
    $query = ChiTietGioHang::where('MaGioHang', $id);

    
    $cartItems = $query->get();

    return view('users.cart.index')->with('cart', $cart)->with('cartItems', $cartItems);
  }
}
