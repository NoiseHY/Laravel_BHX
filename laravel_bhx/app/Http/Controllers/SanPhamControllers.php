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
        $products = SanPham::all();

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

        return redirect('products/create')->with('message', 'Thêm thành công');
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
        $products = SanPham::find($id);
        $products_info = ChiTietSanPham::find($id);
        $category = LoaiSanPham::all();

        return view("admin.products.show", ['products' => $products, 'products_info' => $products_info]);
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
        return view("admin.products.edit")->with("products", $products);
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
         $product = SanPham::findOrFail($id);
 
         $validatedData = $request->validate([
             'TenSP' => 'required|string|max:255',
             'DonGia' => 'required|numeric',
             'SoLuong' => 'required|integer',
             'MoTa' => 'required|string',
            //  'HinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file size limit as needed
         ]);
 
         $product->update($validatedData);
 
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
 
         return redirect()->route('products.index')->with('message', 'Cập nhật thành công!');
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
        return redirect("products")->with("success", "ok");
    }
}
