<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangAdminController extends Controller
{
    protected $views;
    protected $don_hangs;
    protected $chi_tiet_don_hangs;
    public function __construct() {
        $this->views=[];
        $this->don_hangs=new DonHang();
        $this->chi_tiet_don_hangs=new ChiTietDonHang();
    }

    //SHOW
    public function showDSDonHang(){
        $don_hangs = $this->don_hangs->loadDHAdmin();
        $chi_tiet_don_hangs = [];

        foreach ($don_hangs as $item) {
            $chi_tiet_don_hangs[$item->id] = ChiTietDonHang::where('don_hang_id', $item->id)->count();
        }

        $this->views['don_hangs'] = $don_hangs;
        $this->views['countDH'] = $chi_tiet_don_hangs;
        return view('admin.donHang.DSDonHang', $this->views);
    }


    public function showDSDaGiao(){
        return view('admin.donHang.DSDaGiao');
    }

    public function showDSDaHuy(){
        return view('admin.donHang.DSDaHuy');
    }

    public function showDSKiemDuyet(){
        return view('admin.donHang.kiemDuyet');
    }
    //
}
