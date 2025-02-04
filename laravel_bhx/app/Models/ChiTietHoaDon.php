<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $table = "ChiTietHoaDon";

    protected $primaryKey = "MaHD";

    protected $fillable = [
        'MaChiTietHD',
        'MaHD',
        'MaSP',
        'SoLuong',
        'DonGia',
        'ThanhTien'
    ];
}
