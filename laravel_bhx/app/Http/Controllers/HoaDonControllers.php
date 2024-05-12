<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\ThongBao;

class HoaDonControllers extends Controller
{
  public function index()
  {
    $pay = HoaDon::paginate(10);
    return view('admin.pay.index', ['pay' => $pay]);
  }

  public function show($id)
  {

    $pay = HoaDon::where('MaHD', $id)->first();

    $details = ChiTietHoaDon::where('MaHD', $id)->get();

    // dd($details);


    return view('admin.pay.info', ['details' => $details, 'pay' => $pay]);
  }

  public function ok($id)
  {
    $tt = 1;

    $pay = HoaDon::where('MaHD', $id);

    // dd($pay);

    $pay->update(['TrangThai' => $tt]);

    $note = "Đã xác minh đơn hàng thành công !";

    $noti = ThongBao::create([
      'NoiDung' => $note,
      'MaNguoiDung' => session('user_id'),
    ]);

    return redirect('/adminPay')->with('message', 'Đã xác nhận thành công !');
  }
}
