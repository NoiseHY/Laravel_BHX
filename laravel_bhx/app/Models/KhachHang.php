<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'KhachHang';
    protected $primaryKey = 'MaNguoiDung';

    protected $fillable = [
        'MaKH',
        'TenKH',
        'DiaChi',
        'DienThoai',
        'Email',
        'MaNguoiDung',
    ];
}
