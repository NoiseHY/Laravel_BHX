<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiSanPham;
use App\Models\ChiTietGioHang;
use App\Models\ChiTietSanPham;
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

    public function fil(int $id, string $name, int $cat_id)
    {
        // Đếm số lượng sản phẩm trong giỏ hàng
        $number = ChiTietGioHang::count();

        // Lấy tên của thể loại sản phẩm dựa trên mã thể loại
        $category_name = LoaiSanPham::find($cat_id);

        // Lấy tất cả các thể loại sản phẩm
        $category = LoaiSanPham::find($cat_id)->get();

        // dd($cat_id);

        // Lọc sản phẩm theo mã thể loại
        $products = SanPham::where('MaLoai', $cat_id)->get();

        // Lọc thông tin chi tiết sản phẩm theo mã sản phẩm và đơn vị
        $info = ChiTietSanPham::where('DonVi', 'like', '%' . $name . '%')
            ->get();

        // Trả về view với dữ liệu đã lọc
        return view('users.category.index', [
            'products' => $products,
            'category_name' => $category_name,
            'number' => $number,
            'category' => $category,
            'info' => $info
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
