<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaiKhoanRequest;
use App\Http\Requests\UpdateTaiKhoanRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class TaiKhoanAdminController extends Controller
{
    protected $tai_khoans;
    protected $views;
    public function __construct() {
        $this->tai_khoans=new TaiKhoan();
        $this->views=[];
    }

    //SHOW
    public function showTaiKhoanQTV(){
        $this->views['DSTKQTV']=$this->tai_khoans->loadAllTaiKhoan();
        return view('admin.taiKhoan.DSTKQTV',$this->views);
    }

    public function showTaiKhoanTV(){
        $this->views['DSTKTV']=$this->tai_khoans->loadAllTaiKhoan();
        return view('admin.taiKhoan.DSTKTV',$this->views);
    }

    public function showTaiKhoanTKK(){
        $this->views['DSTKK']=$this->tai_khoans->loadAllTaiKhoan();
        return view('admin.taiKhoan.DSTKK',$this->views);
    }

    //add
    public function viewAdd(){
        return view('admin.taiKhoan.add');
    }
    public function add(StoreTaiKhoanRequest $request){
        $dataInsert = [
            'ho_va_ten' => $request->ho_va_ten,
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'mat_khau' => $request->mat_khau,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'role' => $request->role,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $result=$this->tai_khoans->addTaiKhoan($dataInsert);
        if(!$result){
            if($request->role==1){
                return redirect()->route('tai-khoan.danh-sach-TV');
            }else{
                return redirect()->route('tai-khoan.danh-sach-QTV');
            }

        }else{
            return "<script>
                alert('không tải lên được dữ liệu !')
                window.location.href='http://127.0.0.1:8000/admin/index';
            </script>";
        }
    }

    //update
    public function viewUpdate(int $id){
        $this->views['tai_khoan']=$this->tai_khoans->loadOneTaiKhoan($id);
        return view('admin.taiKhoan.update',$this->views);
    }

    public function update(UpdateTaiKhoanRequest $request, int $id){
        $dataUpdate = [
            'ho_va_ten' => $request->ho_va_ten,
            'ten_dang_nhap' => $request->ten_dang_nhap,
            'mat_khau' => $request->mat_khau,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'role' => $request->role,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $result=$this->tai_khoans->updateTaiKhoan($dataUpdate,$id);
        if(!$result){
            if($request->role==1){
                return redirect()->route('tai-khoan.danh-sach-TV');
            }else{
                return redirect()->route('tai-khoan.danh-sach-QTV');
            }

        }else{
            return "<script>
                alert('không tải lên được dữ liệu !')
                window.location.href='http://127.0.0.1:8000/admin/index';
            </script>";
        }
    }

    public function khoaTaiKhoan(int $id){
        $result=$this->tai_khoans->updateTaiKhoan(['trang_thai'=>1],$id);
        if(!$result){
            $tai_khoan=$this->tai_khoans->loadOneTaiKhoan($id);
            if($tai_khoan->role==1){
                return "<script>
                            alert('Đã khóa tài khoản !');
                            window.location.href='http://127.0.0.1:8000/admin/tai-khoan/danh-sach-TV';
                        </script>";
            }else{
                return "<script>
                            alert('Đã khóa tài khoản !');
                            window.location.href='http://127.0.0.1:8000/admin/tai-khoan/danh-sach-QTV';
                        </script>";
            }

        }else{
            return "<script>
                alert('không tải lên được dữ liệu !')
                window.location.href='http://127.0.0.1:8000/admin/index';
            </script>";
        }
    }

    public function moKhoaTaiKhoan(int $id){
        $result=$this->tai_khoans->updateTaiKhoan(['trang_thai'=>0],$id);
        if(!$result){
            return "<script>
                alert('Đã mở khóa tài khoản !');
                window.location.href='http://127.0.0.1:8000/admin/tai-khoan/danh-sach-TKK';
            </script>";
        }else{
            return "<script>
                alert('không tải lên được dữ liệu !');
                window.location.href='http://127.0.0.1:8000/admin/tai-khoan/danh-sach-TKK';
            </script>";
        }
    }

    public function selectKhoaTK(Request $request){
        foreach($request->select as $id){
            $this->tai_khoans->updateTaiKhoan(['trang_thai'=>1],$id);
        }
        return "<script>
                    alert('Đã khóa tài khoản !');
                    window.location.href='http://127.0.0.1:8000/admin/tai-khoan/danh-sach-TKK';
                </script>";
    }
}
