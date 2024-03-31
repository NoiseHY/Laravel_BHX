<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'nguoidung';
    protected $primaryKey = 'MaNguoiDung';
    protected $fillable = ['TenDangNhap', 'MatKhau', 'HoTen', 'Email', 'VaiTro', 'TrangThai', 'NgayTao', 'NgayCapNhat'];
    
}
