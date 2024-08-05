<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
       
        'trang_thai',
        'thanh_toan',
    ];
    public $timestamps = false;

    //admin
    public function loadDHAdmin(){
        $query=DB::table('don_hangs')
        ->join('users','don_hangs.tai_khoan_id','=','users.id')
        ->select('don_hangs.*', 'users.email', 'users.ho_va_ten', 'users.so_dien_thoai', 'users.dia_chi')
        ->paginate(10);

        return $query;
    }

    public function loadOneDonHang($id){
        $query=DB::table('don_hangs')
        ->join('users','don_hangs.tai_khoan_id','=','users.id')
        ->select('don_hangs.*', 'users.email', 'users.ho_va_ten', 'users.so_dien_thoai', 'users.dia_chi')
        ->where('don_hangs.id',$id)
        ->first();

        return $query;
    }
    //end admin
    public function loadAllDonHang(){
        $query=DB::table('don_hangs')
        ->where('tai_khoan_id',Auth::user()->id)
        ->get();

        return $query;
    }
    public function addDonHang($data){
        DB::table('don_hangs')->insert($data);
    }
}
