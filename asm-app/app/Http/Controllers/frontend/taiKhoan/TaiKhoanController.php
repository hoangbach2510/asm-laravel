<?php

namespace App\Http\Controllers\frontend\taiKhoan;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DangKyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\DangNhapRequest;
use App\Mail\ResetPassword;

class TaiKhoanController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function showDangNhap()
    {
        return view('frontend.taiKhoan.dangNhap');
    }

    public function showDangKy()
    {
        return view('frontend.taiKhoan.dangKy');
    }

    public function showQuenMatKhau()
    {
        return view('frontend.taiKhoan.quenMatKhau');
    }

    public function quenMatKhau(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Vui lòng nhập địa chỉ email!',
                'email.email' => 'Địa chỉ email không hợp lệ!',
                'email.exists' => 'Địa chỉ email chưa được đăng ký!',
            ]
        );
    }
    public function dangNhap(DangNhapRequest $request)
    {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->trang_thai == 0) {
                return redirect()->route('trang-chu.home');
            }
        }


        return redirect()->route('trang-chu.home');
    }

    public function dangKy(DangKyRequest $request)
    {
        $dataInsert = [
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'trang_thai' => 2,
            'created_at' => now(),
        ];
        $user = User::create($dataInsert);

        return redirect()->route('tai-khoan.dang-nhap')->with('success', 'Bạn đã đăng ký tài khoản thành công!');
    }
    public function dangXuat()
    {
        Auth::logout();
        return redirect()->route('tai-khoan.dang-nhap');
    }
}
