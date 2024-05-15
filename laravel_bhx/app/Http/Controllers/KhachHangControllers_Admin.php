<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHang;
use App\Models\NguoiDung;

class KhachHangControllers_Admin extends Controller{
  public function index(){
    $cust = KhachHang::paginate(10);

    return view('admin.customer.index')->with('cust', $cust);
  }

  public function show($id){
    $cust = KhachHang::where('MaKH', $id)->first();


    $users = NguoiDung::find($id);

    return view('admin.customer.show',
  [
    'cust' => $cust,
    'users' => $users
  ]
  );
  }
}