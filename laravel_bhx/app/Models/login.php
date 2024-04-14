<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $table = 'nguoidung';
  protected $primaryKey = 'TenDangNhap'; // Chỉ định trường TenDangNhap làm khóa chính
  protected $fillable = ['TenDangNhap', 'MatKhau', 'HoTen', 'Email', 'VaiTro', 'TrangThai', 'NgayTao', 'NgayCapNhat'];
}
