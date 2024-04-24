<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NguoiDung;
use App\Models\KhachHang;
use App\Models\HoaDon;

class TrangCaNhanControllers extends Controller
{
  public function index()
  {

    $id = session('user_id');
    
    $user = NguoiDung::find($id);

    $customer = KhachHang::find($id);

    $pay = HoaDon::find($customer->MaKH)->all();

    return view("users.profile.index", ['user' => $user, 'pay' => $pay]);
  }

  /**
   * Display the specified resource.
   *
   * @param  string  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
    // $user = Nguoidung::where('TenDangNhap', $TenDangNhap)->first();

    // $user = NguoiDung::find($id);

    // $customer = KhachHang::find($id);

    // $pay = HoaDon::find($customer->MaKH)->paginate(10);

    // return view("users.profile.index", ['user' => $user, 'pay' => $pay]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user = Nguoidung::find($id);
    // if (!$user) {
    //   return redirect()->back()->with('error', 'Không tìm thấy người dùng');
    // }

    $input = $request->all();
    $user->update($input);

    return redirect("profile" )->with("message", "Cập nhật thành công");
  }
}
