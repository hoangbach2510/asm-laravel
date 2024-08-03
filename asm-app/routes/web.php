<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeAdmin;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\admin\DanhMucAdminController;
use App\Http\Controllers\admin\DonHangAdminController;
use App\Http\Controllers\admin\SanPhamAdminController;
use App\Http\Controllers\admin\TaiKhoanAdminController;
use App\Http\Controllers\frontend\tinTuc\TinTucController;
use App\Http\Controllers\frontend\gioHang\ChiTietThanhToan;
use App\Http\Controllers\frontend\gioHang\GioHangController;
use App\Http\Controllers\frontend\taiKhoan\DangKyController;
use App\Http\Controllers\frontend\taiKhoan\DangNhapController;
use App\Http\Controllers\frontend\taiKhoan\TaiKhoanController;
use App\Http\Controllers\frontend\sanPham\ChiTietSanPhamController;
use App\Http\Controllers\frontend\sanPham\SanPhamDanhMucController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin
Route::prefix('admin')->group(function(){
    Route::get('index', [HomeAdmin::class,'homeAdmin'])->name('admin.index');

    Route::prefix('tai-khoan')->group(function(){
        Route::get('danh-sach-QTV', [TaiKhoanAdminController::class,'showTaiKhoanQTV'])->name('tai-khoan.danh-sach-QTV');
        Route::put('select-khoa-TK', [TaiKhoanAdminController::class,'selectKhoaTK'])->name('tai-khoan.select-khoa-TK');
        Route::get('danh-sach-TV', [TaiKhoanAdminController::class,'showTaiKhoanTV'])->name('tai-khoan.danh-sach-TV');
        Route::get('danh-sach-TKK', [TaiKhoanAdminController::class,'showTaiKhoanTKK'])->name('tai-khoan.danh-sach-TKK');

        //add
        Route::get('them-tai-khoan', [TaiKhoanAdminController::class,'viewAdd'])->name('tai-khoan.them-tai-khoan');
        Route::post('add', [TaiKhoanAdminController::class,'add'])->name('tai-khoan.add');

        //update
        Route::get('sua-tai-khoan/{id}', [TaiKhoanAdminController::class,'viewUpdate'])->name('tai-khoan.sua-tai-khoan');
        Route::put('update/{id}', [TaiKhoanAdminController::class,'update'])->name('tai-khoan.update');
        Route::get('khoa-tai-khoan/{id}', [TaiKhoanAdminController::class,'khoaTaiKhoan'])->name('tai-khoan.khoa-tai-khoan');
        Route::get('mo-khoa-tai-khoan/{id}', [TaiKhoanAdminController::class,'moKhoaTaiKhoan'])->name('tai-khoan.mo-khoa-tai-khoan');
    });

    //Danh Muc
    Route::prefix('danh-muc')->group(function(){
        Route::get('danh-sach', [DanhMucAdminController::class,'showDanhSach'])->name('danh-muc.danh-sach');
        //add
        Route::get('them-danh-muc', [DanhMucAdminController::class,'viewAdd'])->name('danh-muc.them-danh-muc');
        Route::post('add', [DanhMucAdminController::class,'add'])->name('danh-muc.add');

        //update
        Route::get('sua-danh-muc/{id}', [DanhMucAdminController::class,'viewUpdate'])->name('danh-muc.sua-danh-muc');
        Route::put('update/{id}', [DanhMucAdminController::class,'update'])->name('danh-muc.update');

        //delete
        Route::get('delete/{id}', [DanhMucAdminController::class,'delete'])->name('danh-muc.delete');

        Route::post('xoa-nhieu', [DanhMucAdminController::class,'xoaNhieuDanhMuc'])->name('danh-muc.xoa-nhieu');
    });

    //SanPham
    Route::prefix('san-pham')->group(function(){
        Route::get('danh-sach', [SanPhamAdminController::class,'showDanhSach'])->name('san-pham.danh-sach');

        //add
        Route::get('them-san-pham', [SanPhamAdminController::class,'viewAdd'])->name('san-pham.them-san-pham');
        Route::post('add', [SanPhamAdminController::class,'add'])->name('san-pham.add');

        //update
        Route::get('sua-san-pham/{id}', [SanPhamAdminController::class,'viewUpdate'])->name('san-pham.sua-san-pham');
        Route::put('update/{id}', [SanPhamAdminController::class,'update'])->name('san-pham.update');

        //delete
        Route::get('delete/{id}', [SanPhamAdminController::class,'delete'])->name('san-pham.delete');
        Route::post('xoa-nhieu', [SanPhamAdminController::class,'xoaNhieuSanPham'])->name('san-pham.xoa-nhieu');
    });

    // Tin tuc

    // Banner
   

    //Don hang
    Route::prefix('don-hang')->group(function(){
        Route::get('danh-sach-da-giao', [DonHangAdminController::class,'showDSDaGiao'])->name('don-hang.danh-sach-da-giao');
        Route::get('danh-sach-da-huy', [DonHangAdminController::class,'showDSDaHuy'])->name('don-hang.danh-sach-da-huy');
        Route::get('danh-sach-don-hang', [DonHangAdminController::class,'showDSDonHang'])->name('don-hang.danh-sach-don-hang');
        Route::get('danh-sach-kiem-duyet', [DonHangAdminController::class,'showDSKiemDuyet'])->name('don-hang.danh-sach-kiem-duyet');
    });

});


//client
Route::get('/', [HomeController::class,'home'])->name('trang-chu.home');

Route::prefix('tai-khoan')->group(function(){
    Route::get('dang-nhap', [TaiKhoanController::class,'showDangNhap'])->name('tai-khoan.dang-nhap');
    Route::post('dang-nhap', [TaiKhoanController::class,'dangNhap'])->name('tai-khoan.dang-nhap');

    Route::get('dang-ky', [TaiKhoanController::class,'showDangKy'])->name('tai-khoan.dang-ky');
    Route::post('dang-ky', [TaiKhoanController::class,'dangKy'])->name('tai-khoan.dang-ky');
  

    // Route::get('quen-mat-khau', [TaiKhoanController::class,'showQuenMatKhau'])->name('tai-khoan.quen-mat-khau');
    // Route::post('quen-mat-khau', [TaiKhoanController::class, 'quenMatKhau'])->name('tai-khoan.quen-mat-khau');

    // Route::get('dat-lai-mat-khau/{token}', [TaiKhoanController::class, 'showDatLaiMatKhau'])->name('tai-khoan.dat-lai-mat-khau');
    // Route::post('doi-mat-khau', [TaiKhoanController::class, 'datLaiMatKhau'])->name('tai-khoan.doi-mat-khau');

    Route::get('dang-xuat', [TaiKhoanController::class,'dangXuat'])->name('tai-khoan.dang-xuat');
});

Route::prefix('gio-hang')->group(function(){
    Route::get('show', [GioHangController::class,'show'])->name('gio-hang.show');
    Route::get('chi-tiet-thanh-toan', [ChiTietThanhToan::class,'show'])->name('gio-hang.chi-tiet-thanh-toan');
});

Route::prefix('san-pham')->group(function(){
    Route::get('san-pham-danh-muc', [SanPhamDanhMucController::class,'show'])->name('san-pham.san-pham-danh-muc');
    Route::get('chi-tiet-san-pham/{id}', [SanPhamDanhMucController::class,'chiTietSanPham'])->name('san-pham.chi-tiet-san-pham');
});



// Route::get('/', function(){
//     return view('frontend.home');
// })->name('trang-chu');

// Route::get('dang-nhap', function(){
//     return view('frontend.taiKhoan.dangNhap');
// })->name('dang-nhap');
// Route::get('san-pham', function(){
//     return view('frontend.sanPham.sanPhamDanhMuc');
// })->name('san-pham');
// Route::get('chi-tiet-san-pham', function(){
//     return view('frontend.sanPham.chi_tiet_san_pham');
// })->name('chi-tiet-san-pham');
// Route::get('gio-hang', function(){
//     return view('frontend.gioHang.viewcart');
// })->name('gio-hang');
// Route::get('thanh-toan', function(){
//     return view('frontend.gioHang.checkout');
// })->name('thanh-toan');


