<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Giohang;
use App\Models\ChiTietGioHang;
use App\Models\SanPham;

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

    if (!$cart) {
      return view('users.cart.index')->with('message', 'Bạn chưa thêm sản phẩm nào !');
    }

    $cartId = $cart->MaGioHang;

    $cartItems = ChiTietGioHang::where('MaGioHang', $cartId)->get();

    // $productID = $cartItems->MaSanPham;

    // $products = SanPham::find($productID);

    $products = [];

    foreach ($cartItems as $item) {
      $productId = $item->MaSanPham;

      $product = SanPham::find($productId);

      if (!$product) {
        return view('users.cart.index')->with('message', 'Không tìm thấy sản phẩm trong giỏ hàng!');
      }

      $products[] = $product;
    }


    return view('users.cart.index')->with('cartItems', $cartItems)->with('products', $products);
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
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $productID
   * @return \Illuminate\Http\Response
   */
  public function destroy($productID)
  {
    $cartId = session('user_id');

    if (ChiTietGioHang::where('MaChiTietGioHang', $productID)->delete()) {
      return redirect()->route('cart.show', $cartId)
        ->with('message', 'Xóa thành công !');
    } else {
      return redirect()->back()->with('message', 'Xóa sản phẩm thất bại!');
    }
  }
}
