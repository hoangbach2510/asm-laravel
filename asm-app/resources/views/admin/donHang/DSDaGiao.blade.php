@extends('admin.layout.main')
@section('admin.content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách đơn hàng đã giao</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
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
                                <th>Giá trị đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Thanh toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($don_hangs as $item)
                                @if ($item->trang_thai==4)
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
                                        <td  class="col-2 align-middle text-success">Đã thanh toán</td>
                                        <td class="col-2 align-middle text-center"><a href="{{route('don-hang.chi-tiet-don-hang',$item->id)}}" class="btn btn-warning btn-sm">Xem chi tiết</a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{$don_hangs->links()}}
                </div>
            </div>
        </div>
</div>
<!-- /.container-fluid -->
@endsection
