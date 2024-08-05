@extends('admin.layout.main')
@section('admin.content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm mới danh mục</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('danh-muc.add')}}" method="post" class="form">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Mã loại</label>
                <input type="text" name="id" id="" class="form-control" disabled>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tên danh mục</label>
                <input type="text" name="ten_danh_muc" id="" class="form-control" placeholder="Nhập tên danh mục..." value="{{old('ten_danh_muc')}}">
                @error('ten_danh_muc')
                    <p class="Err mt-1">{{$message}}</p>
                @enderror
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận</button>
                <a href="{{route('danh-muc.danh-sach')}}"><button type="button" class="btn btn-success">Quay lại</button></a>
            </div>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection