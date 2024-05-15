<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Giohang;
use App\Models\ChiTietGioHang;

class GioHangControllers_Admin extends Controller
{
  public function index()
  {
    $cart = Giohang::paginate(10);
    return view('admin.cart.index')->with('cart', $cart);
  }

  public function show($id)
  {
    $cart = Giohang::where('MaGioHang',$id)->first();
  
    $info = ChiTietGioHang::where('MaGioHang', $cart->MaGioHang)->get();

    // dd($info);

    return view(
      'admin.cart.show',
      [
        'cart' => $cart,
        'info' => $info
      ]
    );
  }
  
  public function destroy($id){
    Giohang::find($id) -> delete();

    return redirect('/adminCart')->with('message', 'Xóa thành công !');
    
  }
}
