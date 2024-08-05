<?php

namespace App\Http\Controllers\frontend\gioHang;

use App\Models\GioHang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    protected $views;
    protected $gio_hangs;
    protected $don_hangs;
    protected $chi_tiet_don_hangs;

    public function __construct() {
        $this->views=[];
        $this->gio_hangs=new GioHang();
        $this->don_hangs=new DonHang();
        $this->chi_tiet_don_hangs= new ChiTietDonHang();
    }

    public function showGioHang(){
        $this->views['gio_hangs']=$this->gio_hangs->loadAllGioHang();
        return view('frontend.gioHang.gioHang',$this->views);
    }

    public function showChiTietThanhToan(){
        if(empty(session()->get('gio_hangs', []))){
            return redirect()->route('gio-hang.show');
        }
        $this->views['gio_hang'] = session()->get('gio_hangs', []);
        return view('frontend.gioHang.chiTietThanhToan',$this->views);
    }

    public function donMua(){
        $don_hangs = [
            'trang_thai_all' => $this->don_hangs->loadAllDonHang(),
            'trang_thai_0' => DonHang::where('tai_khoan_id', Auth::user()->id)->where('trang_thai', 0)->get(),
            'trang_thai_1_2' => DonHang::where('tai_khoan_id', Auth::user()->id)->whereIn('trang_thai', [1, 2])->get(),
            'trang_thai_3' => DonHang::where('tai_khoan_id', Auth::user()->id)->where('trang_thai', 3)->get(),
            'trang_thai_4' => DonHang::where('tai_khoan_id', Auth::user()->id)->where('trang_thai', 4)->get(),
            'trang_thai_5' => DonHang::where('tai_khoan_id', Auth::user()->id)->where('trang_thai', 5)->get(),
        ];

        $chi_tiet_don_hangs = [];

        foreach ($don_hangs as $key => $items) {
            foreach ($items as $item) {
                $chi_tiet_don_hangs[$item->id] = $this->chi_tiet_don_hangs->loadAllCTDH($item->id);
            }
        }

        $this->views['don_hangs'] = $don_hangs;
        $this->views['chi_tiet_don_hangs'] = $chi_tiet_don_hangs;

        return view('frontend.gioHang.donMua',$this->views);
    }


    public function addGioHang(Request $request){
        $tai_khoan_id=Auth::user()->id;
        $gia_khuyen_mai=$request->input('gia_khuyen_mai');
        $san_pham_id=$request->input('san_pham_id');
        $gio_hang = GioHang::where('tai_khoan_id', $tai_khoan_id)->where('san_pham_id', $san_pham_id)->first();
        if(!$gio_hang){
            $data = [
                'tai_khoan_id'=> $tai_khoan_id,
                'san_pham_id' => $san_pham_id,
                'so_luong' => 1,
                'thanh_tien' => $gia_khuyen_mai,
                'created_at' => now(),
            ];
            $this->gio_hangs->addGioHang($tai_khoan_id, $data);
        }else{
            $so_luong=$gio_hang->so_luong+1;
            $thanh_tien=$gio_hang->thanh_tien*$so_luong;
            $data = [
                'so_luong' => $so_luong,
                'thanh_tien' => $thanh_tien,
            ];
            $gio_hang->update($data);
        }

    }
    public function muaLaiSanPham(Request $request){
        $tai_khoan_id = Auth::user()->id;
        $san_pham_ids = $request->ids;
        foreach ($san_pham_ids as $id) {
            $san_pham = SanPham::find($id);
            if (!$san_pham) {
                return redirect()->back()->with('error', 'Lỗi khi gửi dữ liệu! Vui lòng thử lại sau ít phút.');
            }
            if ($san_pham->so_luong <= 0) {
                return redirect()->back()->with('error', 'Sản phẩm không còn trong kho !');
            }
            $gio_hang = GioHang::where('tai_khoan_id', $tai_khoan_id)
                            ->where('san_pham_id', $san_pham->id)
                            ->first();
            if ($gio_hang) {
                $so_luong = $gio_hang->so_luong + 1;
                $thanh_tien = $san_pham->gia_khuyen_mai * $so_luong;
                $gio_hang->update(['so_luong' => $so_luong, 'thanh_tien' => $thanh_tien]);
            } else {
                $data = [
                    'tai_khoan_id' => $tai_khoan_id,
                    'san_pham_id' => $san_pham->id,
                    'so_luong' => 1,
                    'thanh_tien' => $san_pham->gia_khuyen_mai,
                ];
                GioHang::create($data);
            }
        }

        return redirect()->route('gio-hang.show')->with('success', 'Thêm thành công sản phẩm vào giỏ hàng!');
    }

    public function capNhatGioHang(Request $request, $id){
        $gio_hang= $this->gio_hangs->find($id);
        if($gio_hang){
            $data = [
                'so_luong' => $request->input('so_luong'),
                'thanh_tien' => $request->input('thanh_tien')
            ];

            $this->gio_hangs->updateGioHang(Auth::user()->id, $id, $data);
        }
    }

    public function tiepTucDatHang(Request $request){

        //xoa gio hang
        if($request->has('xoa_gio_hang')){

            if($request->select){
                foreach($request->select as $id){
                    $gio_hang=$this->gio_hangs->find($id);
                    if($gio_hang){
                        $result=$this->gio_hangs->deleteSelect(Auth::user()->id,$id);
                    }else{
                        return redirect()->back()->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
                    }
                }
                return redirect()->back()->with('success', 'Xóa thành công giỏ hàng !');
            }else{
                $result=$this->gio_hangs->deleteGioHang(Auth::user()->id);
                if(!$result){
                    return redirect()->back()->with('success', 'Xóa thành công giỏ hàng !');
                }else{
                    return redirect()->back()->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
                }
            }
        }

        //tiep tuc dat hang
        if($request->has('tiep_tuc_dat_hang')){
            $gio_hang_ids = $request->input('select', []);

            if (empty($gio_hang_ids)) {
                return redirect()->back()->with('error', 'Bạn chưa chọn sản phẩm nào.');
            }

            // Lấy thông tin chi tiết của các sản phẩm được chọn từ cơ sở dữ liệu
            $gio_hang = $this->gio_hangs->loadChiTietThanhToan(Auth::user()->id, $gio_hang_ids);

            // Lưu thông tin vào session (hoặc bạn có thể truyền trực tiếp đến view)
            session()->put('gio_hangs', $gio_hang);
            return redirect()->route('gio-hang.chi-tiet-thanh-toan');
        }

    }

    public function xacNhanDatHang(Request $request){
        if($request->radio==0){
            if($request->has('dia_chi_khac')){
                $request->validate(
                    [
                        'ho_va_ten_nhan' => 'required|string|max:255',
                        'so_dt_nhan' => 'required|regex:/^0[1-9][0-9]{8}$/',
                        'dia_chi_nhan' => 'required|string|min:4|max:255',
                    ],
                    [
                        'ho_va_ten_nhan.required' => 'Vui lòng không bỏ trống họ và tên !',
                        'ho_va_ten_nhan.max' => 'Họ và tên quá dài !',
                        'so_dt_nhan.required' => 'Vui lòng không bỏ trống số điện thoại !',
                        'so_dt_nhan.regex' => 'Số điện thoại không hợp lệ!',
                        'dia_chi_nhan.required' => 'Vui lòng không bỏ trống địa chỉ !',
                        'dia_chi_nhan.min' => 'Địa chỉ quá ngắn!',
                        'dia_chi_nhan.max' => 'Địa chỉ quá dài!',
                    ]
                );
                $gio_hang = session()->get('gio_hangs', []);
                $dataDonHang=[
                    'tai_khoan_id' => Auth::user()->id,
                    'ho_ten_nhan' => $request->ho_va_ten_nhan,
                    'ngay_dat_hang' => now(),
                    'dia_chi_nhan' => $request->dia_chi_nhan,
                    'so_dt_nhan' => $request->so_dt_nhan,
                    
                ];
                $donHang = DonHang::create($dataDonHang);
                foreach ($gio_hang as $item) {
                    $dataChiTiet=[
                        'don_hang_id' => $donHang->id,
                        'san_pham_id' => $item->san_pham_id,
                        'so_luong' => $item->so_luong,
                        'don_gia' => $item->gia_khuyen_mai,
                        'thanh_tien' => $item->thanh_tien,
                        'created_at' => now()
                    ];
                    ChiTietDonHang::create($dataChiTiet);
                    SanPham::where('id',$item->san_pham_id)->update(['so_luong'=>$item->so_luong_sp-$item->so_luong]);
                    GioHang::where('tai_khoan_id', Auth::user()->id)->where('san_pham_id',$item->san_pham_id)->delete();
                }
                return redirect()->back()->with('success', 'Đặt hàng thành công!');
                return redirect()->route('gio-hang.don-mua');
            }else{
                $request->validate(
                    [
                        'ho_va_ten' => 'required|string|max:255',
                        'so_dien_thoai' => 'required|regex:/^0[1-9][0-9]{8}$/',
                        'dia_chi' => 'required|string|min:4|max:255',
                    ],
                    [
                        'ho_va_ten.required' => 'Vui lòng không bỏ trống họ và tên !',
                        'ho_va_ten.max' => 'Họ và tên quá dài !',
                        'so_dien_thoai.required' => 'Vui lòng không bỏ trống số điện thoại !',
                        'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ!',
                        'dia_chi.required' => 'Vui lòng không bỏ trống địa chỉ !',
                        'dia_chi.min' => 'Địa chỉ quá ngắn!',
                        'dia_chi.max' => 'Địa chỉ quá dài!',
                    ]
                );
                $gio_hang = session()->get('gio_hangs', []);
                $dataDonHang=[
                    'tai_khoan_id' => Auth::user()->id,
                    'ho_ten_nhan' => $request->ho_va_ten,
                    'ngay_dat_hang' => now(),
                    'dia_chi_nhan' => $request->dia_chi,
                    'so_dt_nhan' => $request->so_dien_thoai,
                    
                    
                ];
                $donHang = DonHang::create($dataDonHang);
                foreach ($gio_hang as $item) {
                    $dataChiTiet=[
                        'don_hang_id' => $donHang->id,
                        'san_pham_id' => $item->san_pham_id,
                        'so_luong' => $item->so_luong,
                        'don_gia' => $item->gia_khuyen_mai,
                        'thanh_tien' => $item->thanh_tien,
                        'created_at' => now()
                    ];
                    ChiTietDonHang::create($dataChiTiet);
                    SanPham::where('id',$item->san_pham_id)->update(['so_luong'=>$item->so_luong_sp-$item->so_luong]);
                    GioHang::where('tai_khoan_id', Auth::user()->id)->where('san_pham_id',$item->san_pham_id)->delete();
                }
                return redirect()->route('gio-hang.don-mua');
            }
        }else{

        }
    }

    public function xoaSanPhamGioHang($id){
        $result=$this->gio_hangs->deleteSelect(Auth::user()->id,$id);
        if(!$result){
            return redirect()->back()->with('success', 'Xóa thành công sản phẩm trong giỏ hàng !');
        }else{
            return redirect()->back()->with('error', 'Lỗi khi gửi dữ liệu ! Vui lòng thử lại sau ít phút.');
        }
    }


}
