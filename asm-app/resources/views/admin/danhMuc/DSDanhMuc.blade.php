@extends('admin.layout.main')
@section('containerAdmin')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách danh mục</h1>
    <form action="{{route('danh-muc.xoa-nhieu')}}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" type="submit" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <a href="{{route('danh-muc.them-danh-muc')}}" class="btn btn-secondary btn-sm">Nhập thêm</a>
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
                                <th>Mã loại</th>
                                <th>Tên danh mục</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($DSDanhmuc as $item)
                            <tr>
                                <td class="col-1 text-center"><input type="checkbox" name="select[]" value="{{$item->id}}"></td>
                                <td class="col-2">DEMI-{{$item->id}}</td>
                                <td>{{$item->ten_danh_muc}}</td>
                                <td class="col-2">
                                    <a href="{{ route('danh-muc.sua-danh-muc', $item->id) }}" class="btn btn-secondary btn-sm">Sửa</a> |
                                    <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')"  href="{{ route('danh-muc.delete', $item->id) }}" class="btn btn-secondary btn-sm">Xóa</a> |
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="phantrang">
                        {{$DSDanhmuc->links()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
