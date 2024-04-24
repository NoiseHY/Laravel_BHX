<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;
use App\Models\SanPham;

class LoaiSanPhamControllers extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $categories = LoaiSanPham::all();

    return view('admin.categories.index', ['categories' => $categories]);
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $categories = LoaiSanPham::find($id);
    return view('admin.categories.show')->with('categories', $categories);
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
    $categories = LoaiSanPham::find($id);

    return view("admin.categories.edit")->with("categories", $categories);
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

    $categories = LoaiSanPham::find($id);

    $input = $request->all();

    $categories->update($input);

    $categories->save();

    return redirect()->back()->with('message', 'Cập nhật thành công !');
  }
  public function create()
  {
    return view("admin.categories.create");
  }
  public function store(Request $request)
  {

    $input = $request->all();

    LoaiSanPham::create($input);

    return redirect()->back()->with("message", "Thêm thành công!");
  }
}
