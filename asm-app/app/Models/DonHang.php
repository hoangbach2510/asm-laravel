<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';
    protected $fillable = [
        'tai_khoan_id',
        'ho_ten_nhan',
        'ngay_dat_hang',
        'dia_chi_nhan',
        'so_dt_nhan',
        'thanh_toan',
        'phuong_thuctt',
        'trang_thai',
        'thanh_toan',
    ];
    public $timestamps = false;

    public function addDonHang($data){
        DB::table('don_hangs')->insert($data);
    }
    //admin
    public function loadDHAdmin(){
        $query=DB::table('don_hangs')
        ->join('users','don_hangs.tai_khoan_id','=','users.id')
        ->select('don_hangs.*', 'users.email')
        ->paginate(10);

        return $query;
    }
    public function loadAllDonHang(){
        $query=DB::table('don_hangs')
        ->where('tai_khoan_id',Auth::user()->id)
        ->get();

        return $query;
    }
}
