<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaiKhoanRequest;
use App\Http\Requests\UpdateTaiKhoanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class TaiKhoanAdminController extends Controller
{
    protected $userModel;
    protected $views;

    public function __construct() {
        $this->userModel = new User();
        $this->views = [];
    }

    //SHOW
    public function showTaiKhoanQTV(Request $request){
        $keyword = $request->input('kyw');
        if ($keyword) {
            $this->views['DSTKQTV'] = $this->userModel->searchTaiKhoan($keyword);
        } else {
            $this->views['DSTKQTV'] = $this->userModel->loadAllTaiKhoan();
        }
        return view('admin.taiKhoan.DSTKQTV', $this->views);
    }

    public function showTaiKhoanTV(Request $request){
        $keyword = $request->input('kyw');
        if ($keyword) {
            $this->views['DSTKTV'] = $this->userModel->searchTaiKhoan($keyword);
        } else {
            $this->views['DSTKTV'] = $this->userModel->loadAllTaiKhoan();
        }
        return view('admin.taiKhoan.DSTKTV', $this->views);
    }

    public function showTaiKhoanTKK(Request $request){
        $keyword = $request->input('kyw');
        if ($keyword) {
            $this->views['DSTKK'] = $this->userModel->searchTaiKhoan($keyword);
        } else {
            $this->views['DSTKK'] = $this->userModel->loadAllTaiKhoan();
        }
        return view('admin.taiKhoan.DSTKK', $this->views);
    }

    //add
    public function viewAdd(){
        return view('admin.taiKhoan.add');
    }

    public function add(StoreTaiKhoanRequest $request){
        $dataInsert = [
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'role' => $request->role,
            'trang_thai' => 0,
            'created_at' => now()
        ];
        $result = $this->userModel->addTaiKhoan($dataInsert);
        if(!$result){
            if($request->role==1){
                return redirect()->route('tai-khoan.danh-sach-TV')->with('success', 'Bạn đã thêm tài khoản thành công !');
            }else{
                return redirect()->route('tai-khoan.danh-sach-QTV')->with('success', 'Bạn đã thêm tài khoản thành công !');
            }
        } else {
            return redirect()->back()
                             ->with('error', 'Không thể thêm tài khoản. Vui lòng thử lại.');
        }
    }

    //update
    public function viewUpdate(int $id){
        $this->views['tai_khoan'] = $this->userModel->find($id);
        return view('admin.taiKhoan.update', $this->views);
    }

    public function update(UpdateTaiKhoanRequest $request, int $id){
        $dataUpdate = [
            'ho_va_ten' => $request->ho_va_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'role' => $request->role,
            'updated_at' => now()
        ];
        $user = $this->userModel->find($id);
        if ($user) {
            $this->userModel->updateTaiKhoan($dataUpdate,$id);
            if($request->role==1){
                return redirect()->route('tai-khoan.danh-sach-TV')->with('success', 'Bạn đã sửa tài khoản thành công !');
            }else{
                return redirect()->route('tai-khoan.danh-sach-QTV')->with('success', 'Bạn đã sửa tài khoản thành công !');
            }
        } else {
            return redirect()->back()
                             ->with('error', 'Không thể cập nhật tài khoản. Vui lòng thử lại.');
        }
    }

    public function khoaTaiKhoan(int $id){
        $user = $this->userModel->find($id);
        if ($user) {
            $this->userModel->updateTaiKhoan(['trang_thai' => 1],$id);
            if($user->role==1){
                return redirect()->route('tai-khoan.danh-sach-TV')->with('success', 'Bạn đã khóa tài khoản thành công !');
            }else{
                return redirect()->route('tai-khoan.danh-sach-QTV')->with('success', 'Bạn đã khóa tài khoản thành công !');
            }
        } else {
            return redirect()->back()
                             ->with('error', 'Không thể khóa tài khoản. Vui lòng thử lại.');
        }
    }

    public function moKhoaTaiKhoan(int $id){
        $user = $this->userModel->find($id);
        if ($user) {
            $this->userModel->updateTaiKhoan(['trang_thai' => 0],$id);
            return redirect()->route('tai-khoan.danh-sach-TKK')
                             ->with('success', 'Đã mở khóa tài khoản!');
        } else {
            return redirect()->back()
                             ->with('error', 'Không thể mở khóa tài khoản. Vui lòng thử lại.');
        }
    }

    public function selectKhoaTK(Request $request){
        foreach($request->select as $id){
            $user = $this->userModel->find($id);
            if ($user) {
                $this->userModel->updateTaiKhoan(['trang_thai' => 1],$id);
            }
        }
        return redirect()->route('tai-khoan.danh-sach-TKK')
                         ->with('success', 'Đã khóa tài khoản!');
    }
}
