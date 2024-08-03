<?php

namespace App\Http\Controllers\frontend\gioHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiTietThanhToan extends Controller
{
    public function __construct() {
        
    }

    public function show(){
        return view('frontend.gioHang.checkout');
    }
}
