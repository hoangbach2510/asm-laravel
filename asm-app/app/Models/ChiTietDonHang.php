<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_hangs';
    protected $fillable = [
        'don_hang_id',
        'san_pham_id',
        'so_luong',
        'don_gia',
        'thanh_tien',
    ];
    public $timestamps = false;

    public function loadAllCTDH($don_hang_id){
        $query=DB::table('chi_tiet_don_hangs')
        ->join('san_phams','chi_tiet_don_hangs.san_pham_id','=','san_phams.id')
        ->select('chi_tiet_don_hangs.*','san_phams.ten_san_pham','san_phams.hinh_anh')
        ->where('don_hang_id',$don_hang_id)
        ->get();

        return $query;
    }
}
