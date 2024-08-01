<?php

namespace App\Http\Controllers\frontend\taiKhoan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DangNhapController extends Controller
{
    public function __construct() {
        
    }

    public function show(){
        return view('frontend.taiKhoan.dangNhap');
    }
}
