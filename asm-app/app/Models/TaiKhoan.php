<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TaiKhoan extends Model
{
    use HasFactory;

    public function loadAllTaiKhoan(){
        $query= DB::table('tai_khoans')
        ->orderBy('id','desc')
        ->paginate(10);
        return $query;
    }
    public function loadOneTaiKhoan($id){
        $query= DB::table('tai_khoans')->find($id);
        return $query;
    }

    public function addTaiKhoan($data){
        DB::table('tai_khoans')->insert($data);
    }

    public function updateTaiKhoan($data, $id){
        DB::table('tai_khoans')->where('id',$id)->update($data);
    }

}
