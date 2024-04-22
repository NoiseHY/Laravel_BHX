<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\SanPham;
use App\Models\KhachHang;

class HoaDonControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.pay.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.pay.index');
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

        $money = $request->input('total-price');

        // dd($money, $input);

        $customer = KhachHang::find(session('user_id'));
        $customerId = $customer->MaKH;

        $input['MaKH'] = $customerId;


        $input['TrangThai'] = 1;
        $input['NgayBan'] = now();
        $input['TongTien'] = $money;

        $pay = HoaDon::create($input);

        $products = $request->input('product');

        // dd($products);

        $quantities = $request->input('quantities');
        $totalPrices = $request->input('totalPrices');

        // Lặp qua từng sản phẩm và tạo chi tiết hóa đơn cho mỗi sản phẩm
        foreach ($products as $key => $product) {
            $chiTietHoaDon = new ChiTietHoaDon([
                'MaHD' => $pay->MaHD,
                'MaSP' => $product['id'],
                'SoLuong' => $quantities[$key],
                'DonGia' => $product['price'],
                'TongTien' => $totalPrices[$key]
            ]);
            $chiTietHoaDon->save();
        }

        // Chuyển hướng hoặc trả về view tùy thuộc vào logic ứng dụng của bạn
        return view('users.cart.index')->with('message', 'Tạo thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pay = HoaDon::find($id);

        $info = ChiTietHoaDon::where('MaHD', $id)->get();

        $products = [];
        foreach ($info as $detail) {
            $product = SanPham::find($detail->MaSP);
            if ($product) {
                $products[] = $product;
            }
        }

        $customer = KhachHang::find(session('user_id'));

        return view('users.pay.index', [
            'info' => $info, 'products' => $products,
            'customer' => $customer, 'pay' => $pay
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
