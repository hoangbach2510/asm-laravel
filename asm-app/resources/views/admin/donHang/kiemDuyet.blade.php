@extends('admin.layout.main')
@section('admin.content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800 mb-5">Duyệt đơn hàng</h1>
        @if (session('success'))
            <div class="alert alert-success" id="error-alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" id="error-alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class=" float-right">
                    <form action="#" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <form action="{{ route('don-hang.duyet-nhieu-don-hang') }}" method="post">
                    @csrf
                    <div class="float-left">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="chontatca()">Chọn tất cả</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="bochontatca()">Bỏ chọn tất cả</button>
                        <button type="submit" class="btn btn-secondary btn-sm">Duyệt các đơn hàng đã chọn</button>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Số lượng</th>
                                <th></th>
                                <th>Ngày đặt hàng</th>
                                <th>Thanh toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($don_hangs as $item)
                                @if ($item->trang_thai==0)
                                    <tr>
                                        <td class=" align-middle"><input type="checkbox" name="select[]"
                                            value="{{ $item->id }}"></td>
                                        <td class="col-1 align-middle">DH-{{$item->id}}</td>
                                        <td class="col-3 align-middle">
                                            {{$item->ho_ten_nhan}} <br>
                                            {{$item->so_dt_nhan}} <br>
                                            {{$item->email}} <br>
                                            {{$item->dia_chi_nhan}}
                                        </td>
                                        <td class="text-center align-middle">{{$countDH[$item->id]}}</td>
                                        <td  class="col-1 align-middle"></td>
                                        <td class="col-2 align-middle">{{$item->ngay_dat_hang}}</td>
                                        @if ($item->thanh_toan==0)
                                            <td  class="col-2 align-middle text-danger">Chưa thanh toán</td>
                                        @else
                                            <td  class="col-2 align-middle text-success">Đã thanh toán</td>
                                        @endif
                                        <td class="col-2 align-middle text-center"><a href="{{route('don-hang.duyet-don-hang',$item->id)}}" class="btn btn-secondary btn-sm">Duyệt</a> <br><br>
                                            <a href="{{route('don-hang.huy-don-hang',$item->id)}}" class="btn btn-secondary btn-sm">Hủy</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{$don_hangs->links()}}
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
