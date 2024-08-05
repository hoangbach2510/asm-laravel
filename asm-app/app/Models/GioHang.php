<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'gio_hangs';
    protected $fillable = [
        'tai_khoan_id',
        'san_pham_id',
        'so_luong',
        'thanh_tien',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function loadAllGioHang(){
        $query=DB::table('gio_hangs')
            ->join('users','gio_hangs.tai_khoan_id','=','users.id')
            ->join('san_phams','gio_hangs.san_pham_id','=','san_phams.id')
            ->select('gio_hangs.*','san_phams.hinh_anh','san_phams.ten_san_pham','san_phams.gia_khuyen_mai', 'san_phams.so_luong as so_luong_sp')
            ->where('tai_khoan_id',Auth::user()->id)
            ->orderBy('id','desc')
            ->get();
        return $query;
    }
    public function loadChiTietThanhToan($user, $id){
        $query=DB::table('gio_hangs')
            ->join('san_phams','gio_hangs.san_pham_id','=','san_phams.id')

            ->select('gio_hangs.*','san_phams.ten_san_pham','san_phams.gia_khuyen_mai', 'san_phams.so_luong as so_luong_sp')
            ->where('tai_khoan_id', $user)
            ->whereIn('gio_hangs.id',$id)
            ->get();
        return $query;
    }
    public function loadOneGioHang($user, $san_pham_id){
        $query=DB::table('gio_hangs')
        ->where('tai_khoan_id', $user)
        ->where('san_pham_id',$san_pham_id)
        ->firstOrFail();
        return $query;
    }
    public function addGioHang($user,$data){
        DB::table('gio_hangs')->where('tai_khoan_id',$user)->insert($data);
    }

    public function countGioHang(){
        $query=DB::table('gio_hangs')
        ->where('tai_khoan_id', Auth::user()->id)
        ->count();

        return $query;
    }

    public function deleteGioHang($user){
        DB::table('gio_hangs')
        ->where('tai_khoan_id', $user)
        ->delete();
    }

    public function deleteSelect($user,$id){
        DB::table('gio_hangs')
        ->where('id',$id)
        ->where('tai_khoan_id', $user)
        ->delete();
    }
    public function updateGioHang($user, $id, $data){
        DB::table('gio_hangs')
        ->where('id',$id)
        ->where('tai_khoan_id', $user)
        ->update($data);
    }
}
