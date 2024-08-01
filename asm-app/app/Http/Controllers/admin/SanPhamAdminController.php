<?php

namespace App\Http\Controllers\admin;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSanPhamRequest;
use App\Http\Requests\UpdateSanPhamRequest;

class SanPhamAdminController extends Controller
{
    protected $san_phams;
    protected $views;

    public function __construct() {
        $this->san_phams=new SanPham();
        $this->views=[];
    }

    //SHOW
    public function showDanhSach(){
        $this->views['DSSanPham']=$this->san_phams->loadAllSanPham();
        return view('admin.sanPham.DSSanPham',$this->views);
    }

    //add
    public function viewAdd(){
        $this->views['danh_mucs']=$this->san_phams->loadAllDanhMuc();
        return view('admin.sanPham.add',$this->views);
    }

    public function add(StoreSanPhamRequest $request){
        if($request->hasFile('hinh_anh')){
            $fileName=$request->file('hinh_anh')->store('uploads/sanPham','public');
        }else{
            $fileName=null;
        }
        $gia_khuyen_mai=$request->gia_san_pham-($request->gia_san_pham*($request->khuyen_mai/100));
        if($request->so_luong==0) $trang_thai=0;
        else $trang_thai=1;
        $dataInsert=[
            'danh_muc_id' => $request->danh_muc_id,
            'ten_san_pham' => $request->ten_san_pham,
            'gia_san_pham' => $request->gia_san_pham,
            'gia_khuyen_mai' => $gia_khuyen_mai,
            'hinh_anh' => $fileName,
            'so_luong' => $request->so_luong,
            'trang_thai' => $trang_thai,
            'khuyen_mai' => $request->khuyen_mai,
            'mo_ta' => $request->mo_ta,
            'created_at' => now()
        ];
        $result=$this->san_phams->addSanPham($dataInsert);
        if(!$result){
            return redirect()->route('san-pham.danh-sach');
        }else{
            return redirect()->route('san-pham.them-san-pham');
        }
    }

    //update
    public function viewUpdate(int $id){
        $this->views['danh_mucs']=$this->san_phams->loadAllDanhMuc();
        $this->views['san_pham']=$this->san_phams->loadOneSanPham($id);
        return view('admin.sanPham.update',$this->views);
    }

    public function update(UpdateSanPhamRequest $request, int $id){
        $san_pham=$this->san_phams->loadOneSanPham($id);
        if($san_pham){
            if($request->hasFile('hinh_anh')){
                $fileName=$request->file('hinh_anh')->store('uploads/sanPham','public');

                if ($san_pham->hinh_anh) {
                    Storage::disk('public')->delete($san_pham->hinh_anh);
                }
            }else{
                $fileName=$san_pham->hinh_anh;
            }

            $gia_khuyen_mai=$request->gia_san_pham-($request->gia_san_pham*($request->khuyen_mai/100));

            if($request->so_luong==0) $trang_thai=0;
            else $trang_thai=1;

            $dataUpdate=[
                'danh_muc_id' => $request->danh_muc_id,
                'ten_san_pham' => $request->ten_san_pham,
                'gia_san_pham' => $request->gia_san_pham,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'hinh_anh' => $fileName,
                'so_luong' => $request->so_luong,
                'trang_thai' => $trang_thai,
                'khuyen_mai' => $request->khuyen_mai,
                'mo_ta' => $request->mo_ta,
                'updated_at' => now()
            ];
            $result=$this->san_phams->updateSanPham($dataUpdate,$id);
            if(!$result){
                return redirect()->route('san-pham.danh-sach');
            }
        }else{
            return redirect()->route('san-pham.danh-sach')->withErrors('Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    public function delete(int $id){
        $san_pham=$this->san_phams->loadOneSanPham($id);
        if($san_pham){
            $this->san_phams->deleteSanPham($id);
            if ($san_pham->hinh_anh) {
                Storage::disk('public')->delete($san_pham->hinh_anh);
            }
            return redirect()->route('san-pham.danh-sach');
        }else{
            return redirect()->route('san-pham.danh-sach')->withErrors('Có lỗi xảy ra, vui lòng thử lại');
        }
    }

    public function xoaNhieuSanPham(Request $request){
        foreach($request->select as $id){
            $san_pham=$this->san_phams->loadOneSanPham($id);
            if($san_pham){
                $this->san_phams->deleteSanPham($id);
                if ($san_pham->hinh_anh) {
                    Storage::disk('public')->delete($san_pham->hinh_anh);
                }
            }else{
                break;
            }
        }
        return redirect()->route('san-pham.danh-sach');
    }
}
