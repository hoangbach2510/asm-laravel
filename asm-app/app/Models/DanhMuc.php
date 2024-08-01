<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DanhMuc extends Model
{
    use HasFactory;

    public function loadAllDanhMuc(){
        $query = DB::table('danh_mucs')
        ->orderBy('id','desc')
        ->paginate(10);
        return $query;
    }
    public function searchDanhMuc($keyword){
        $query = DB::table('danh_mucs')
            ->where('ten_danh_muc', 'LIKE', "%$keyword%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return $query;
    }
    public function loadOneDanhMuc($id){
        $query= DB::table('danh_mucs')->find($id);
        return $query;
    }
    public function addDanhMuc($data){
        DB::table('danh_mucs')->insert($data);
    }
    public function updateDanhMuc($data, $id){
        DB::table('danh_mucs')->where('id',$id)->update($data);
    }
    public function deleteDanhMuc($id){
        DB::table('danh_mucs')
        ->where('id',$id)
        ->delete();
    }
}
