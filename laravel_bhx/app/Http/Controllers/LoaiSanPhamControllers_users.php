<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;
use App\Models\ChiTietGioHang;
use App\Models\SanPham;

class LoaiSanPhamControllers_users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $number = ChiTietGioHang::count();

        $category = LoaiSanPham::all();

        $category_id = 1;

        $category_name = LoaiSanPham::find($category_id);

        $products = SanPham::where('MaLoai', $category_id)->get();

        return view('users.category.index', [
            'number' => $number, 'category' => $category,
            'products' => $products,
            'category_name' => $category_name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $number = ChiTietGioHang::count();

        $category_name = LoaiSanPham::find($id);

        $category = LoaiSanPham::all();

        $products = SanPham::where('MaLoai', $id)->get();

        return view('users.category.index', [
            'products' => $products, 'category_name' => $category_name,
            'number' => $number,
            'category' => $category
        ]);
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
    }
}
