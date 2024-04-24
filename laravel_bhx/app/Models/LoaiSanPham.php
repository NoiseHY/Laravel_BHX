<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $primaryKey = 'MaLoai';

    protected $table = 'LoaiSanPham';

    protected $fillable = ['MaLoai' ,
    'TenLoai' ,
    'MoTa' ];

        
}
