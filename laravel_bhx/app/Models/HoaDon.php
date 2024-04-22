<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = "MaKH";

    protected $table = "HoaDon" ;

    protected $fillable = [
        'MaHD' ,
        'NgayBan' ,
        'MaKH' ,
        'TongTien' ,
        'TrangThai'];

}
