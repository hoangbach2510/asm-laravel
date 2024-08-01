<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TinTuc;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $views;
    protected $san_phams;
    protected $danh_mucs;
    protected $tin_tucs;
    protected $banners;

    public function __construct() {
        $this->views=[];
        $this->san_phams=new SanPham();
        $this->danh_mucs=new DanhMuc();
    }

    public function home(){

        $this->views['danh_mucs']=$this->danh_mucs->loadAllDanhMuc();
      
        $this->views['san_pham_moi_nhat']=$this->san_phams->loadSanPhamMoiNhat();

        return view('frontend.home',$this->views);
    }
}
