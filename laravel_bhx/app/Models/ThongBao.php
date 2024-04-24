<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongBao extends Model
{
  use HasFactory;
  public $timestamps = false;

  protected $table = 'ThongBao';
  protected $primaryKey = 'MaNguoiDung';
  protected $fillable = [
    'MaThongBao',
    'MaNguoiDung',
    'NoiDung',
    'ThoiGian',
    'TrangThai'
  ];
}
