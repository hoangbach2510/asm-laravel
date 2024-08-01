@extends('admin.layout')
@section('admin.content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới tài khoản</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="?act=addtk" method="post" class="form">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="hovaten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="hovaten" name="hovaten" placeholder="Nhập họ và tên..."  value="">
                        <p class="Err mt-1"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="tendangnhap" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Nhập tên đăng nhập..." value="">
                        <p class="Err mt-1"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matkhau" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="VD: Example123...">
                        <p class="Err mt-1"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="VD: example@gmail.com..." value="">
                        <p class="Err mt-1"></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="sodienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại..." value="">
                        <p class="Err mt-1"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ..." value="">
                        <p class="Err mt-1"></p>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <label for="sel1">Vai Trò</label>
                        <select class="form-control" id="sel1" name="role">
                            <option value="0">Thành viên</option>     
                            <option value="1">Quản trị viên</option>
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
@endsection