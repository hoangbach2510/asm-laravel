<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;

    public function loadAllSanPham(){
        $query=DB::table('san_phams')
        ->join('danh_mucs','san_phams.danh_muc_id','=','danh_mucs.id')
        ->select('san_phams.*','danh_mucs.ten_danh_muc')
        ->orderBy('id','desc')
        ->paginate(10);
        return $query;
    }
    public function searchSanPham($keyword){
        $query = DB::table('san_phams')
            ->join('danh_mucs','san_phams.danh_muc_id','=','danh_mucs.id')
            ->select('san_phams.*','danh_mucs.ten_danh_muc')
            ->where('san_phams.ten_san_pham', 'LIKE', "%$keyword%")
            ->orWhere('danh_mucs.ten_danh_muc', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $query;
    }
    public function loadSanPhamMoiNhat(){
        $query=DB::table('san_phams')
        ->limit(10)
        ->orderBy('id','desc')
        ->get();
        return $query;
    }
    public function loadSanPhamDanhMuc($id){
        $query = DB::table('san_phams')
        ->where('danh_muc_id',$id)
        ->orderBy('id','desc')
        ->paginate(10);
        return $query;
    }
    public function loadAllDanhMuc(){
        $query = DB::table('danh_mucs')->get();
        return $query;
    }

    public function loadOneSanPham($id){
        $query=DB::table('san_phams')->find($id);
        return $query;
    }

    public function countSanPhamDanhMuc(){
        $query=DB::table('danh_mucs')
        ->leftJoin('san_phams', 'danh_mucs.id', '=', 'san_phams.danh_muc_id')
        ->select('danh_mucs.id', 'danh_mucs.ten_danh_muc', DB::raw('count(san_phams.id) as san_phams_count'))
        ->groupBy('danh_mucs.id', 'danh_mucs.ten_danh_muc')
        ->get();
        return $query;
    }

    public function addSanPham($data){
        DB::table('san_phams')->insert($data);
    }

    public function updateSanPham($data, $id){
        DB::table('san_phams')->where('id',$id)->update($data);
    }

    public function deleteSanPham($id){
        DB::table('san_phams')->where('id',$id)->delete();
    }
}
