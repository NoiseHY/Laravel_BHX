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
        $info = ChiTietSanPham::findOrFail($id);

        $product = SanPham::findOrFail($info->MaSanPham);

        $validatedData = $request->validate([
            'TenSP' => 'required|string|max:255',
            'DonGia' => 'required|numeric',
            'SoLuong' => 'required|integer',
            'MoTa' => 'required|string',
            'HinhAnh' => ($request->hasFile('HinhAnh') ? 'image|mimes:jpeg,png,jpg,gif|max:2048' : 'nullable')
        ]);

        // Cập nhật thông tin sản phẩm
        $info->fill($validatedData)->save();

        if ($request->hasFile('HinhAnh')) {
            $uploadedImages = [];
            foreach ($request->file('HinhAnh') as $image) {

                $imageName = time() . '_' . $image->getClientOriginalName();

                $image->move(public_path('uploads'), $imageName);

                $uploadedImages[] = $imageName;
            }
            
            $info->HinhAnh()->createMany([
                ['link' => $uploadedImages[0]], 
                ['link' => $uploadedImages[1]], 
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Sửa thành công !');
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
