<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TinTuc extends Model
{
    use HasFactory;

    public function loadAllTinTuc(){
        $query=DB::table('tin_tucs')
        ->orderBy('id','desc')
        ->paginate(10);

        return $query;
    }

    public function loadOneTinTuc($id){
        $query=DB::table('tin_tucs')->find($id);
        return $query;
    }

    public function addTinTuc($data){
        DB::table('tin_tucs')->insert($data);
    }

    public function updateTinTuc($data, $id){
        DB::table('tin_tucs')->where('id',$id)->update($data);
    }

    public function deleteTinTuc($id){
        DB::table('tin_tucs')->delete($id);
    }
}
