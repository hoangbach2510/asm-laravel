@extends('admin.layout.main')
@section('containerAdmin')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách tài khoản</h1>
    <form action="{{route('tai-khoan.select-khoa-TK')}}" method="post">
        @csrf
        @method('PUT')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                <button type="submit" class="btn btn-secondary btn-sm">Khóa các tài khoản đã chọn</button>
                <a href="{{route('tai-khoan.them-tai-khoan')}}"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
                <div class="float-right">
                    <div class="input-group">
                        <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="search">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>MQTV</th>
                                <th>Họ và Tên</th>
                                <th>Tên đăng nhập</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($DSTKQTV as $item)
                                @if($item->role==0&&$item->trang_thai==0)
                                    <tr>
                                        <td class="align-middle text-center"><input type="checkbox" name="select[]" value="{{$item->id}}"></td>
                                        <td class="align-middle text-center">{{$item->id}}</td>
                                        <td class="col-2 align-middle">{{$item->ho_va_ten}}</td>
                                        <td class="col-1 align-middle">{{$item->ten_dang_nhap}}</td>
                                        <td  class="col-1 align-middle">{{$item->email}}</td>
                                        <td class="col-1 align-middle">{{$item->so_dien_thoai}}</td>
                                        <td class="col-2 align-middle">{{$item->dia_chi}}</td>
                                        <td>Quản trị viên</td>
                                        <td class="col-2 align-middle text-center"><a href="{{route('tai-khoan.sua-tai-khoan',$item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Sửa</button></a> |
                                            <a href="{{route('tai-khoan.khoa-tai-khoan',$item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Khóa</button></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="phantrang">
                        {{$DSTKQTV->links()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
