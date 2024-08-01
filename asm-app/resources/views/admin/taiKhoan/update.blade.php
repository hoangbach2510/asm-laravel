@extends('admin.layout.main')
@section('containerAdmin')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cập nhật thông tin</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('tai-khoan.update',$tai_khoan->id)}}" method="post" class="form">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="" name="ho_va_ten" placeholder="Nhập họ và tên..." value="{{old('ho_va_ten',$tai_khoan->ho_va_ten)}}">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập..." value="{{old('ten_dang_nhap',$tai_khoan->ten_dang_nhap)}}">
                    @error('ten_dang_nhap')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Mật Khẩu</label>
                    <input type="password" class="form-control" id="" name="mat_khau" placeholder="VD: example123..." value="{{old('mat_khau',$tai_khoan->mat_khau)}}">
                    @error('mat_khau')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="VD: example@gmail.com..." value="{{old('email',$tai_khoan->email)}}">
                    @error('email')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="" name="so_dien_thoai" placeholder="Nhập số điện thoại..." value="{{old('so_dien_thoai',$tai_khoan->so_dien_thoai)}}">
                    @error('so_dien_thoai')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="" name="dia_chi" placeholder="Nhập địa chỉ..." value="{{old('dia_chi',$tai_khoan->dia_chi)}}">
                    @error('dia_chi')
                        <p class="text-danger mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="sel1">Vai Trò</label>
                    <select class="form-control" id="sel1" name="role">
                        <option {{$tai_khoan->role==0?'selected':''}} value="0">Quản trị viên</option>
                        <option {{$tai_khoan->role==1?'selected':''}} value="1">Thành viên</option>
                        
                    </select>
                </div>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection