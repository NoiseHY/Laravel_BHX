<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SanPham;
use App\Models\ChiTietSanPham;
use App\Models\LoaiSanPham;

use Illuminate\Support\Facades\Storage;

class SanPhamControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = SanPham::paginate(10);

        // dd($products);

        $category = LoaiSanPham::all();

        return view("admin.products.index", ['products' => $products, 'category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = LoaiSanPham::all();


        return view("admin.products.create")->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'TenSP' => 'required',
            'DonGia' => 'required',
            'SoLuong' => 'required',
            'MoTa' => 'required',
            'MaLoai' => 'required',
            'HinhAnh' => 'required',
        ], [
            'TenSP.required' => 'Vui lòng nhập trường tên sản phẩm',
            'DonGia.required' => 'Vui lòng nhập trường đơn giá sản phẩm',
            'SoLuong.required' => 'Vui lòng nhập trường số lượng sản phẩm',
            'MoTa.required' => 'Vui lòng nhập trường mô tả sản phẩm',
            'MaLoai.required' => 'Vui lòng chọn trường loại sản phẩm',
            'HinhAnh.required' => 'Vui lòng nhập trường hình ảnh sản phẩm',
        ]);

        $request->validate([
            'HinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadsFolder = public_path('uploads');
        if (!file_exists($uploadsFolder)) {
            mkdir($uploadsFolder);
        }

        $tenSPFolder = public_path('uploads/' . $request->TenSP);
        if (!file_exists($tenSPFolder)) {
            mkdir($tenSPFolder);
        }

        if ($request->hasFile('HinhAnh')) {
            $imageName = time() . '.' . $request->HinhAnh->getClientOriginalExtension(); // Lấy phần mở rộng của tệp gốc
            $request->HinhAnh->move($tenSPFolder, $imageName);
        }


        $input = $request->all();
        $input['HinhAnh'] = $imageName;
        $input['MaLoai'] = $request->MaLoai;

        $products = SanPham::create($input);

        $info = new ChiTietSanPham();

        $info->MaSP = $products->MaSP;

        $info->save();

        return redirect('/products')->with('message', 'Thêm thành công');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products = SanPham::find($id);
        $products_info = ChiTietSanPham::find($id);
        $category = LoaiSanPham::where('MaLoai', $products->MaLoai)->first();

        return view("admin.products.show", [
            'products' => $products,
            'products_info' => $products_info,
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
        $products = SanPham::find($id);

        $category = LoaiSanPham::all();

        return view("admin.products.edit", ['category' => $category, 'products' => $products    ]);
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
            'TenSP' => 'required',
            'DonGia' => 'required',
            'SoLuong' => 'required',
            'MoTa' => 'required',
            'MaLoai' => 'required',
        ], [
            'TenSP.required' => 'Vui lòng nhập trường tên sản phẩm',
            'DonGia.required' => 'Vui lòng nhập trường đơn giá sản phẩm',
            'SoLuong.required' => 'Vui lòng nhập trường số lượng sản phẩm',
            'MoTa.required' => 'Vui lòng nhập trường mô tả sản phẩm',
            'MaLoai.required' => 'Vui lòng chọn trường loại sản phẩm',
        ]);
        $product = SanPham::findOrFail($id);

        $input = $request->all();

        $product->update($input);

        //  // Handle image upload if provided
        //  if ($request->hasFile('HinhAnh')) {
        //      $fileName = time() . '.' . $request->HinhAnh->getClientOriginalExtension();
        //      $product->HinhAnh = $fileName; // Update product image attribute

        //      // Store the uploaded image in the 'uploads' disk (replace with your storage configuration)
        //      $request->HinhAnh->storeAs('uploads/' . $product->TenSP, $fileName, 'public');

        //      // Optionally delete the old image if it exists and a new one was uploaded
        //      if ($product->wasOriginallyChanged('HinhAnh')) {
        //          Storage::disk('public')->delete('uploads/' . $product->getOriginal('TenSP') . '/' . $product->getOriginal('HinhAnh'));
        //      }
        //  }



        $product->save();

        return redirect('/products')->with('message', 'Cập nhật thành công!');
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
        SanPham::find($id)->delete();
        return redirect('/products')->with("message", "Xóa thành công !");
    }
}
