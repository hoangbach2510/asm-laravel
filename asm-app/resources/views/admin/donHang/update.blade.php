@extends('admin.layout.main')
@section('admin.content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{route('don-hang.cap-nhat-don-hang',$don_hang->id)}}" method="post" class="form">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="" class="form-label">Mã đơn hàng</label>
                    <input type="text" id="" class="form-control" value="DH-{{$don_hang->id}}" disabled>
                </div>
                <div class="mb-3">
                    <?php foreach ($chi_tiet_don_hangs as $ct) : ?>
                        <img src="{{Storage::url($ct->hinh_anh)}}" alt="" height="60px">
                        <span style="margin-left:15px;">{{$ct->ten_san_pham}}</span>
                        <span style="margin-left:80px;">Số lượng x {{$ct->so_luong}}</span>
                        <span style="margin-left:100px;">Thành tiền: <?= number_format($ct->thanh_tien,0,',','.');?>đ</span>
                        <hr>
                    <?php endforeach; ?>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Họ và tên</label>
                        <input type="text" id="" class="form-control" value="{{$don_hang->ho_ten_nhan}}" onkeydown="return false">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Số điện thoại</label>
                        <input type="text" id="" class="form-control" value="{{$don_hang->so_dt_nhan}}" onkeydown="return false">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Địa chỉ</label>
                        <input type="text" id="" class="form-control" value="{{$don_hang->dia_chi_nhan}}" onkeydown="return false">
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">ngày đặt hàng</label>
                        <input type="text" id="" class="form-control" value="{{$don_hang->ngay_dat_hang}}" onkeydown="return false">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="sel1">Trạng thái giao hàng</label>
                        <select class="form-control" id="sel1" name="trang_thai">
                            <option {{($don_hang->trang_thai==1)?'selected':''}} value="1">Đơn hàng mới</option>
                            <option {{($don_hang->trang_thai==2)?'selected':''}} value="2">Chuẩn bị giao hàng cho đơn vị vận chuyển</option>
                            <option {{($don_hang->trang_thai==3)?'selected':''}} value="3">Đang giao hàng</option>
                            <option value="4">Đã giao</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <a href="{{route('don-hang.danh-sach-don-hang')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
                </div>
            </form>
        </div>
    </div>


    </div>
    <!-- /.container-fluid -->
@endsection
