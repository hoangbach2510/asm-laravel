@extends('admin.layout.main')
@section('admin.content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 mb-5">Danh Sách Tài Khoản Thành Viên</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class=" float-right">
                    <form action="{{ route('tai-khoan.danh-sach-TV') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="kyw" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="{{ route('tai-khoan.select-khoa-TK') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="float-left">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất
                            cả</button>
                        <button type="submit" class="btn btn-secondary btn-sm">Khóa các tài khoản đã chọn</button>
                        <a href="{{ route('tai-khoan.them-tai-khoan') }}"><button type="button"
                                class="btn btn-secondary btn-sm">Nhập thêm</button></a>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>STT</th>
                                <th>Họ và Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DSTKTV as $item)
                                @if ($item->role == 1 && $item->trang_thai == 0)
                                    <tr>
                                        <td class="align-middle text-center"><input type="checkbox" name="select[]"
                                                value="{{ $item->id }}"></td>
                                        <td class="align-middle text-center">{{ $item->id }}</td>
                                        <td class="col-2 align-middle">{{ $item->ho_va_ten }}</td>
                                        <td class="col-1 align-middle">{{ $item->email }}</td>
                                        <td class="col-1 align-middle">{{ $item->so_dien_thoai }}</td>
                                        <td class="col-2 align-middle">{{ $item->dia_chi }}</td>
                                        <td>Thành viên</td>
                                        <td class="col-2 align-middle text-center"><a
                                                href="{{ route('tai-khoan.sua-tai-khoan', $item->id) }}"><button
                                                    type="button" class="btn btn-secondary btn-sm">Sửa</button></a> |
                                            <a href="{{ route('tai-khoan.khoa-tai-khoan', $item->id) }}"><button
                                                    type="button" class="btn btn-secondary btn-sm">Khóa</button></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="phantrang">
                        {{ $DSTKTV->links() }}
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
