<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonHangAdminController extends Controller
{
    public function __construct() {
        
    }

    //SHOW
    public function showDSDonHang(){
        return view('admin.donHang.DSDonHang');
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
