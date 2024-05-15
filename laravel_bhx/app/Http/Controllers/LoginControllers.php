<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\NguoiDung;

class LoginControllers extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('login.index');
  }
  // public function store(Request $request)
  // {
  //   $credentials = $request->validate([
  //     'TenDangNhap' => 'required|string',
  //     'MatKhau' => 'required|string',
  //   ]);

  //   if (Auth::attempt($credentials)) {
  //     return redirect()->intended('/home');
  //   }

  //   return back()->withErrors([
  //     'TenDangNhap' => 'Thông tin đăng nhập không chính xác.',
  //   ]);
  // }

  public function store(Request $request)
  {
    $TenDangNhap = $request->input('TenDangNhap');
    $MatKhau = $request->input('MatKhau');

    $user = NguoiDung::where('TenDangNhap', $TenDangNhap)->first();

    if ($user && $user->MatKhau === $MatKhau) {
      // $request->session()->forget('user');
      // $request->session()->put('user_name', $user->TenDangNhap);
      $request->session()->put('user_id', $user->MaNguoiDung);


      // dd($request->session()->all());
      if ($user->VaiTro == 1) {
        return redirect()->intended('/admin')->with('message', 'Đăng nhập thành công!');
      } else {
        return redirect()->intended('/home');
      }
    }

    return redirect('/login')->with('message', 'Thông tin đăng nhập không chính xác.');
  }




  /** 
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function logout(Request $request)
  {
    // Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/home');
  }
}
