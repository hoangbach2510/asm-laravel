@extends('admin.layout.main')
@section('containerAdmin')
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách sản phẩm</h1>
    <form action="{{route('san-pham.xoa-nhieu')}}" method="post">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                <button type="submit" class="btn btn-secondary btn-sm">Xóa các mục đã chọn</button>
                <a href="{{route('san-pham.them-san-pham')}}"><button type="button" class="btn btn-secondary btn-sm">Nhập thêm</button></a>
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
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá gốc</th>
                                <th>Số lượng</th>
                                <th>Khuyến mãi</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($DSSanPham as $item)
                            <tr>
                                <td class="align-middle text-center"><input type="checkbox" name="select[]" id="" value="{{$item->id}}"></td>
                                <td class="col-1 align-middle text-center">NM-{{$item->id}}</td>
                                <td  class="col-1 align-middle"><img src="{{Storage::url($item->hinh_anh)}}" alt="err" height="60px"></td>
                                <td class="col-2 align-middle">{{$item->ten_san_pham}}</td>
                                <td class="col-2 align-middle">{{number_format($item->gia_san_pham, 0, ',', '.')}} VND</td>
                                <td  class="col-1 align-middle">{{$item->so_luong}}</td>
                                <td  class="align-middle">{{$item->khuyen_mai}}%</td>
                                <td  class="col-1 align-middle">{{$item->ten_danh_muc}}</td>
                                @if ($item->trang_thai==0)
                                    <td class="col-1 align-middle text-danger">Hết hàng</td>
                                @else
                                    <td class="col-1 align-middle text-success">Còn hàng</td>
                                @endif
                                <td class="col-2 align-middle"><a href="{{route('san-pham.sua-san-pham',$item->id)}}" class="btn btn-secondary btn-sm">Sửa</a> |
                                    <a href="{{route('san-pham.delete',$item->id)}}" class="btn btn-secondary btn-sm">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="phantrang">
                        {{$DSSanPham->links()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->
@endsection
