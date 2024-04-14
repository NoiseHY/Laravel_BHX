<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NguoiDung;
use App\Models\KhachHang;

class TrangCaNhanControllers extends Controller
{
  public function index()
  {
    return view('users.profile.index');
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

    $user = NguoiDung::find($id);

    if ($user) {
      return view("users.profile.index")->with("users", $user);
    } else {
      return "Không tìm thấy người dùng với tên "  . $id;
    }
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
    if (!$user) {
      return redirect()->back()->with('error', 'Không tìm thấy người dùng');
    }

    $input = $request->all();
    $user->update($input);

    return redirect("profile/" . $user->TenDangNhap)->with("message", "Cập nhật thành công");
  }
}
