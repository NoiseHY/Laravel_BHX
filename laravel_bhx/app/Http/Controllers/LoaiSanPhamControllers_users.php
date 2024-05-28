<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;
use App\Models\ChiTietGioHang;
use App\Models\ChiTietSanPham;
use App\Models\SanPham;
use App\Models\Giohang;

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
        $card = Giohang::find(session('user_id'));

        $number = ChiTietGioHang::where('MaGioHang', $card->MaGioHang)->count();

        $category = LoaiSanPham::all();

        $category_id = 1;

        $category_name = LoaiSanPham::find($category_id);

        $products = SanPham::where('MaLoai', $category_id)->paginate(9);

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
        $card = Giohang::find($id);

        $number = ChiTietGioHang::where('MaGioHang', $card->MaGioHang)->count();

        $category_name = LoaiSanPham::find($id);

        $category = LoaiSanPham::all();

        $products = SanPham::where('MaLoai', $id)->paginate(9);

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
