<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietGioHang extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $table = 'GioHang';
  protected $primaryKey = 'MaGioHang';
}
