@extends('admin.layout.main')
@section('admin.content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách tài khoản đã bị khóa</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
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
                                <th class="col-1 text-center">STT</th>
                                <th>Họ và Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($DSTKK as $item)
                            @if($item->trang_thai==1)
                                <tr>
                                    <td class="align-middle text-center">{{$item->id}}</td>
                                    <td class="col-2 align-middle">{{$item->ho_va_ten}}</td>
                                    <td  class="col-1 align-middle">{{$item->email}}</td>
                                    <td class="col-1 align-middle">{{$item->so_dien_thoai}}</td>
                                    <td class="col-2 align-middle">{{$item->dia_chi}}</td>
                                    <td class="col-1">
                                        @if($item->role == 0)
                                            Quản trị viên
                                        @elseif($item->role == 1)
                                            Thành viên
                                        @endif
                                    </td>
                                    <td class="col-1 align-middle text-center"><a href="{{route('tai-khoan.mo-khoa-tai-khoan',$item->id)}}"><button type="button" class="btn btn-secondary btn-sm">Mở khóa</button></a></td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div class="phantrang">
                        {{$DSTKK->links()}}
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
@endsection
