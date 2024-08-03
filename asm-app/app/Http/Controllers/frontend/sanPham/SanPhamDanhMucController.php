<?php

namespace App\Http\Controllers\frontend\sanPham;

use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SanPhamDanhMucController extends Controller
{
    protected $views;
    protected $san_phams;
    protected $danh_mucs;
    public function __construct() {
        $this->views=[];
        $this->san_phams=new SanPham();
        $this->danh_mucs=new DanhMuc();
    }

    public function show(){
        $this->views['san_phams']=$this->san_phams->loadAllSanPham();
        $this->views['danh_mucs']=$this->danh_mucs->loadAllDanhMuc();
        $this->views['count_danh_muc']=$this->san_phams->countSanPhamDanhMuc();
        return view('frontend.sanPham.sanPhamDanhMuc',$this->views);
    }

    public function sanPhamDanhMuc(int $id){
        $this->views['san_phams']=$this->san_phams->loadSanPhamDanhMuc($id);
        $this->views['count_danh_muc']=$this->san_phams->countSanPhamDanhMuc();
        return view('frontend.sanPham.sanPhamDanhMuc',$this->views);
    }

    public function chiTietSanPham(int $id){
        $san_pham=$this->san_phams->loadOneSanPham($id);
        $this->views['san_pham']=$san_pham;
        $this->views['san_phams']=$this->san_phams->loadSanPhamDanhMuc($san_pham->danh_muc_id);
        $this->views['danh_muc']=$this->danh_mucs->loadOneDanhMuc($san_pham->danh_muc_id);
        return view('frontend.sanPham.chi_tiet_san_pham',$this->views);
    }
}
