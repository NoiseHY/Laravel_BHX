<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChiTietSanPham;
use App\Models\SanPham;

class ChiTietSanPhamControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
        //
        $info = ChiTietSanPham::find($id);
        $products = SanPham::find($id);
        return view('admin.products.info', ['info' => $info, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            'ThuongHieu' => 'required',
            'KhoiLuong' => 'required',
            'DonVi' => 'required',
            'SanXuatTai' => 'required',
            'HanSuDung' => 'required',
            'ThanhPhan' => 'required',
            'BaoQuan' => 'required',
            'HuongDanSuDung' => 'required',

        ], [
            'ThuongHieu.required' => 'Vui lòng nhập trường thương hiệu',
            'KhoiLuong.required' => 'Vui lòng nhập trường khối lương',
            'DonVi.required' => 'Vui lòng nhập trường đơn vị ',
            'SanXuatTai.required' => 'Vui lòng nhập trường sản xuất  tại',
            'HanSuDung.required' => 'Vui lòng nhập trường hạn sử dụng',
            'ThanhPhan.required' => 'Vui lòng nhập trường thành phần ',
            'BaoQuan.required' => 'Vui lòng nhập trường bảo quản ',
            'HuongDanSuDung.required' => 'Vui lòng nhập trường hướng dẫn sử dụng ',
        ]);

        $info = ChiTietSanPham::findOrFail($id);

        $products = SanPham::find($id);

        if ($request->has('HinhAnh') && $request->HinhAnh[0] === null) {
            $request->request->remove('HinhAnh'); 
        }

        $info->update($request->all());

        return redirect("info/" . $info->MaSP)->with([
            "message" => "Cập nhật thành công",
            "products" => $products
        ]);
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
