<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NguoiDung;
use App\Models\SanPham;
use App\Models\HoaDon;

class ThongKeControllers extends Controller
{
  public function index()
  {
    // nguoidung
    $totalUsers = NguoiDung::count();

    $adminUsers = NguoiDung::where('VaiTro', '1')->count();
    $normalUsers = NguoiDung::where('VaiTro', '2')->count();

    $currentMonth = date('m'); // Lấy tháng hiện tại

    $userCountByMonth = NguoiDung::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
      ->whereRaw("MONTH(created_at) = $currentMonth") // Lọc theo tháng hiện tại
      ->groupBy('month')
      ->get();


    // products

    $totalProducts = SanPham::count();

    // Số lượng sản phẩm tồn kho theo tháng hiện tại
    $stockCountByMonth = SanPham::whereMonth('created_at', $currentMonth)
      ->selectRaw('SUM(SoLuong) as total_stock')
      ->first();

    // Số lượng sản phẩm mới nhất theo tháng hiện tại
    $newestProductByMonth = SanPham::whereMonth('created_at', $currentMonth)
      ->selectRaw('COUNT(*) as total')
      ->first();

    // dd($newestProductByMonth);

    // Thống kê số lượng sản phẩm theo tháng hiện tại
    $productCountByMonth = SanPham::whereMonth('updated_at', $currentMonth)
      ->selectRaw('COUNT(*) as total')
      ->first();


    //List

    // Số lượng sản phẩm tồn kho theo từng tháng
    $ListstockCountByMonth = SanPham::selectRaw('MONTH(created_at) as month, SUM(SoLuong) as total_stock')
      ->groupBy('month')
      ->get();

    // Sản phẩm mới nhất theo từng tháng
    $ListnewestProduct = SanPham::selectRaw('MONTH(created_at) as month, MAX(created_at) as newest_date')
      ->groupBy('month')
      ->get();

    // Tổng số lượng sản phẩm theo từng tháng
    $ListtotalProductCount = SanPham::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
      ->groupBy('month')
      ->get();


    // dd($userCountByMonth);
    return view('admin.home', [
      'totalUsers' => $totalUsers, 'adminUsers' => $adminUsers, 'normalUsers' => $normalUsers, 'userCountByMonth' => $userCountByMonth,
      'totalProducts' => $totalProducts, 'stockCountByMonth' => $stockCountByMonth, 'newestProductByMonth' => $newestProductByMonth, 'productCountByMonth' => $productCountByMonth,
      'ListstockCountByMonth' => $ListstockCountByMonth, 'ListnewestProduct' => $ListnewestProduct, 'ListtotalProductCount' => $ListtotalProductCount,


    ]);
  }
}
