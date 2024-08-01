<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerAdminController extends Controller
{
    public $Banner;
    public function __construct() {
       $this->Banner = new Banner();
    }

    //SHOW
    public function showDanhSach(){

        $DSBanner = $this->Banner->loadAllBanners();
        return view('admin.banner.DSBanner',['DSBanner'=>$DSBanner]);
    }

    //add
    public function viewAdd(){
        return view('admin.banner.add');
    }

    //update
    public function viewUpdate(){
        return view('admin.banner.update');
    }
}
