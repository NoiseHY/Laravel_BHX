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
        $users = Nguoidung::all();
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
        
        $input = $request->all();
      
        $input['VaiTro'] = 2;
        $input['TrangThai'] = 1;

        Nguoidung::create($input);

        return redirect("users")->with("success", "Thêm người dùng thành công!");
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
        //
        $users = Nguoidung::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect("users")->with("success","Cập nhật thành công");
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
        return redirect("users")->with("success","Xóa thành công !");
    }
}
