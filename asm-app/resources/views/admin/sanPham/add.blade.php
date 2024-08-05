@extends('admin.layout.main')
@section('admin.content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('san-pham.add')}}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" name="ten_san_pham" placeholder="Nhập tên sản phẩm..." value="{{old('ten_san_pham')}}">
                @error('ten_san_pham')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá</label>
                <input type="text" class="form-control" id="" name="gia_san_pham" placeholder="Nhập giá..." value="{{old('gia_san_pham')}}">
                @error('gia_san_pham')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tải ảnh lên:</label>
                <input type="file" name="hinh_anh" id="" class="form-control-file border">
                @error('hinh_anh')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Số lượng</label>
                <input type="text" class="form-control" id="" name="so_luong" placeholder="Nhập số lượng..." value="{{old('so_luong')}}">
                @error('so_luong')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Khuyến mãi (%)</label>
                <input type="text" class="form-control" id="" name="khuyen_mai" placeholder="Nhập khuyến mãi..." value="{{old('khuyen_mai')}}">
                @error('khuyen_mai')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="">Mô tả</label>
                <textarea class="form-control" rows="5" id="" name="mo_ta" placeholder="Nhập mô tả...">{{old('mo_ta')}}</textarea>
                @error('mo_ta')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sel1">Danh mục</label>
                <select class="form-control" id="sel1" name="danh_muc_id">
                    @foreach ($danh_mucs as $item)
                        <option {{ old('danh_muc_id') == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->ten_danh_muc}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{route('san-pham.danh-sach')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection
