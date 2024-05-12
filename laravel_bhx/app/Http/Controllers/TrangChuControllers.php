<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SanPham;
use App\Models\Giohang;
use App\Models\ChiTietGioHang;
use App\Models\ThongBao;

use Carbon\Carbon;

class TrangChuControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today()->toDateString();

        $id = session('user_id');

        $card = Giohang::find($id);

        $number = ChiTietGioHang::where('MaGioHang', $card->MaGioHang)->count();

        $products = SanPham::paginate(9);

        $noti = ThongBao::where('MaNguoiDung', $id)->whereDate('ThoiGian', $today)
            ->orderByDesc('ThoiGian') // Sắp xếp theo thời gian giảm dần
            ->get();



        // dd($noti);

        return view("users.index", [
            'products' => $products,
            'number' => $number,
            'noti' => $noti
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
        //
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
