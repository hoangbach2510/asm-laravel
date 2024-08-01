<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeAdmin extends Controller
{
    public function __construct() {
        
    }

    public function homeAdmin(){
        return view('admin.admin');
    }
}
