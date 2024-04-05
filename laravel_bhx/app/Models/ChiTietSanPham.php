<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = "MaSP";
    
    protected $table = "ChiTietSanPham";
    protected $fillable = ['MaChiTietSP',
    'MaSP' ,
    'MauSac',
    'KichThuoc',
    'XuatXu' ,
    'ThongTinKhac'];
      
}
