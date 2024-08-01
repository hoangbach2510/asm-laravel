<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDanhMucRequest;
use App\Http\Requests\UpdateDanhMucRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\DanhMuc;

class DanhMucAdminController extends Controller
{
    protected $danh_mucs;
    protected $views;
    public function __construct() {
        $this->danh_mucs=new DanhMuc();
        $this->views=[];
    }

    //SHOW
    public function showDanhSach(){
        $this->views['DSDanhmuc'] = $this->danh_mucs->loadAllDanhMuc();
        return view('admin.danhMuc.DSDanhMuc',$this->views);
    }

    //add
    public function viewAdd(){
        return view('admin.danhMuc.add');
    }
    public function add(StoreDanhMucRequest $request){
       $dataInsert=[
            'ten_danh_muc' => $request->ten_danh_muc,
            'created_at' => now()
       ];
       $result= $this->danh_mucs->addDanhMuc($dataInsert);
       if(!$result){
            return redirect()->route('danh-muc.danh-sach');
       }else{
        return "<script>alert('Đã xảy ra lỗi !')</script>";
       }
    }
    //update
    public function viewUpdate(int $id){
        $this->views['danh_muc']=$this->danh_mucs->loadOneDanhMuc($id);
        return view('admin.danhMuc.update',$this->views);
    }

    public function update(UpdateDanhMucRequest $request, int $id){
        $dataUpdate=[
            'ten_danh_muc'=> $request->ten_danh_muc,
            'updated_at' => now()
        ];
        $result=$this->danh_mucs->updateDanhMuc($dataUpdate,$id);
        if(!$result){
            return redirect()->route('danh-muc.danh-sach');
        }else{
            return "<script>alert('Đã xảy ra lỗi !')</script>";
        }
    }

    public function delete($id){
        $danh_muc=$this->danh_mucs->loadOneDanhMuc($id);
        if($danh_muc){
            $this->danh_mucs->deleteDanhMuc($id);
            return redirect()->route('danh-muc.danh-sach');
        }
    }

    public function xoaNhieuDanhMuc(Request $request){
        foreach($request->select as $id){
            $danh_muc=$this->danh_mucs->loadOneDanhMuc($id);
            if($danh_muc){
                $this->danh_mucs->deleteDanhMuc($id);
            }else{
                return redirect()->route('admin.index');
            }
        }
        return redirect()->route('danh-muc.danh-sach');
    }
}
