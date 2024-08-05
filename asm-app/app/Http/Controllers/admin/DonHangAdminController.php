<?php

namespace App\Http\Controllers\admin;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\ChiTietDonHang;
use App\Http\Controllers\Controller;

class DonHangAdminController extends Controller
{
    protected $views;
    protected $don_hangs;
    protected $chi_tiet_don_hangs;
    protected $pdf;
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
        $don_hangs = $this->don_hangs->loadDHAdmin();
        $chi_tiet_don_hangs = [];

        foreach ($don_hangs as $item) {
            $chi_tiet_don_hangs[$item->id] = ChiTietDonHang::where('don_hang_id', $item->id)->count();
        }

        $this->views['don_hangs'] = $don_hangs;
        $this->views['countDH'] = $chi_tiet_don_hangs;
        return view('admin.donHang.DSDaGiao', $this->views);
    }

    public function showDSDaHuy(){
        $don_hangs = $this->don_hangs->loadDHAdmin();
        $chi_tiet_don_hangs = [];

        foreach ($don_hangs as $item) {
            $chi_tiet_don_hangs[$item->id] = ChiTietDonHang::where('don_hang_id', $item->id)->count();
        }

        $this->views['don_hangs'] = $don_hangs;
        $this->views['countDH'] = $chi_tiet_don_hangs;
        return view('admin.donHang.DSDaHuy', $this->views);
    }

    public function showDSKiemDuyet(){
        $don_hangs = $this->don_hangs->loadDHAdmin();
        $chi_tiet_don_hangs = [];

        foreach ($don_hangs as $item) {
            $chi_tiet_don_hangs[$item->id] = ChiTietDonHang::where('don_hang_id', $item->id)->count();
        }

        $this->views['don_hangs'] = $don_hangs;
        $this->views['countDH'] = $chi_tiet_don_hangs;
        return view('admin.donHang.kiemDuyet', $this->views);
    }

    public function showChiTietDonHang($id)
    {
        $don_hang = $this->don_hangs->loadOneDonHang($id);
        $chi_tiet_don_hangs = $this->chi_tiet_don_hangs->loadAllCTDH($id);

        return view('admin.donHang.chiTietDonHang', [
            'don_hang' => $don_hang,
            'chi_tiet_don_hangs' => $chi_tiet_don_hangs,
        ]);
    }

    public function inHoaDon($id)
    {
        $don_hang = $this->don_hangs->loadOneDonHang($id);
        $chi_tiet_don_hangs = $this->chi_tiet_don_hangs->loadAllCTDH($id);

        return view('admin.donHang.hoaDon', [
            'don_hang' => $don_hang,
            'chi_tiet_don_hangs' => $chi_tiet_don_hangs,
        ]);
    }

    //

    public function huyDonHang(int $id){
        $don_hang=DonHang::where('id',$id)->first();
        if($don_hang){
            DonHang::where('id',$id)->update(['trang_thai'=>5]);
            return redirect()->route('don-hang.danh-sach-don-hang')->with('success', 'Hủy đơn hàng thành công.');
        }else{
            return redirect()->route('don-hang.danh-sach-don-hang')->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
        }
    }

    public function duyetDonHang(int $id){
        $don_hang=DonHang::where('id',$id)->first();
        if($don_hang){
            DonHang::where('id',$don_hang->id)->update(['trang_thai'=>1]);
            return redirect()->route('don-hang.danh-sach-kiem-duyet')->with('success', 'Duyệt đơn hàng thành công.');
        }else{
            return redirect()->route('don-hang.danh-sach-kiem-duyet')->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
        }
    }

    public function showCapNhatDonHang(int $id){
        $this->views['don_hang']=$this->don_hangs->find($id);
        $this->views['chi_tiet_don_hangs']=$this->chi_tiet_don_hangs->loadAllCTDH($id);
        return view('admin.donHang.update', $this->views);
    }

    public function capNhatDonHang(Request $request, int $id){
        $don_hang=DonHang::where('id',$id)->first();
        if($don_hang){
            DonHang::where('id',$don_hang->id)->update(['trang_thai'=>$request->trang_thai]);
            return redirect()->route('don-hang.danh-sach-don-hang')->with('success', 'Cập nhật trạng thái đơn hàng thành công.');
        }else{
            return redirect()->route('don-hang.danh-sach-don-hang')->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
        }

    }

    public function duyetNhieuDonHang(Request $request){
        foreach($request->select as $id){
            $don_hang=$this->don_hangs->find($id);
            if($don_hang){
                DonHang::where('id',$don_hang->id)->update(['trang_thai'=>1]);
            }else{
                return redirect()->route('don-hang.danh-sach-kiem-duyet')->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
            }
        }
        return redirect()->route('don-hang.danh-sach-kiem-duyet')->with('success', 'Duyệt đơn hàng thành công.');
    }
}
