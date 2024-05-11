<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nguoidung;

class NguoiDungControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Nguoidung::paginate(10);
        return view("admin.users.index")->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'TenDangNhap' => 'required',
            'MatKhau' => 'required',
            'HoTen' => 'required',
            'Email' => 'required',
        ], [
            'TenDangNhap.required' => 'Vui lòng nhập trường tên đăng nhập',
            'MatKhau.required' => 'Vui lòng nhập trường mật khẩu',
            'HoTen.required' => 'Vui lòng nhập trường họ và tên',
            'Email.required' => 'Vui lòng nhập trường email',

        ]);

        $input = $request->all();

        $input['VaiTro'] = 2;
        $input['TrangThai'] = 1;

        Nguoidung::create($input);

        return redirect('/users')->with("message", "Thêm người dùng thành công!");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $users = Nguoidung::find($id);
        return view("admin.users.show")->with("users", $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = Nguoidung::find($id);
        return view("admin.users.edit")->with("users", $users);
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
        $request->validate([
            'TenDangNhap' => 'required',
            'MatKhau' => 'required',
            'HoTen' => 'required',
            'Email' => 'required',
        ], [
            'TenDangNhap.required' => 'Vui lòng nhập trường tên đăng nhập',
            'MatKhau.required' => 'Vui lòng nhập trường mật khẩu',
            'HoTen.required' => 'Vui lòng nhập trường họ và tên',
            'Email.required' => 'Vui lòng nhập trường email',

        ]);
        $users = Nguoidung::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('/users')->with("message", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Nguoidung::find($id)->delete();
        return redirect('/users')->with("message", "Xóa thành công !");
    }
}
