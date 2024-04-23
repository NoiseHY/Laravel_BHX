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

        // dd($request);

        $input = $request->all();
        $money = $request->input('total-price');

        $customer = KhachHang::find(session('user_id'));
        $customerId = $customer->MaKH;

        $input['MaKH'] = $customerId;
        $input['TrangThai'] = 1;
        $input['NgayBan'] = now();
        $input['TongTien'] = $money;

        $pay = HoaDon::create($input);

        // dd($pay->MaKH); //primary key

        // $info = new ChiTietHoaDon();

        // $info->MaHD = $pay->MaHD;

        // $info->save();

        // Lặp qua mảng "products"

        $productsArray = json_decode($request->input('products')[0], true);

        // Lặp qua các sản phẩm trong mảng
        foreach ($productsArray as $product) {
            $productId = $product['productID'];
            $quantity = $product['quantity'];
            $price = $product['price'];
            $totalPrice = $product['totalPrice'];

            // Tạo một instance mới của ChiTietHoaDon và lưu nó
            $info = new ChiTietHoaDon([
                'MaHD' => $pay->MaKH,
                'MaSP' => $productId,
                'SoLuong' => $quantity,
                'DonGia' => $price,
                'ThanhTien' => $totalPrice
            ]);

            $info->save();
        }


        return redirect()->back()->with('message', 'Đã tạo thành công hóa đơn, vui lòng kiểm tra !');
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
