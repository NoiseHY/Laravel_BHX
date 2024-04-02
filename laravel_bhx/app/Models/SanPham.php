<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'SanPham';
    protected $primaryKey = 'MaSP';
    
    protected $fillable = ['MaSP' ,'TenSP' ,
    'MaLoai' ,
    'DonGia',
    'SoLuong' ,
    'MoTa' ,
    'HinhAnh'] ;
    
}
