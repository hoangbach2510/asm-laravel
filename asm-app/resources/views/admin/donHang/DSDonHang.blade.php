@extends('admin.layout.main')
@section('admin.content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Danh sách đơn hàng</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-right">
                    <form action="{{ route('don-hang.danh-sach-don-hang') }}" method="GET">
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Khách Hàng</th>
                                <th>Số lượng</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Thanh toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($don_hangs as $item)
                                @if ($item->trang_thai==1 || $item->trang_thai==2 || $item->trang_thai==3)
                                    <tr>
                                        <td class="col-1 align-middle">NM-{{$item->id}}</td>
                                        <td class="col-3 align-middle">
                                            {{$item->ho_va_ten}} <br>
                                            {{$item->so_dt_nhan}} <br>
                                            {{$item->email}} <br>
                                            {{$item->dia_chi_nhan}}
                                        </td>
                                        <td class="text-center align-middle">{{$countDH[$item->id]}}</td>
                                        <td  class="col-1 align-middle">{{number_format($item->tong_thanh_toan, 0, ',', '.')}}đ</td>
                                        <td  class="col-2 align-middle">{{$item->trang_thai}}</td>
                                        {{-- @if ()

                                        @elseif

                                        @else

                                        @endif --}}
                                        <td class="col-2 align-middle">{{$item->ngay_dat_hang}}</td>
                                        @if ($item->thanh_toan==0)
                                            <td  class="col-2 align-middle text-danger">Chưa thanh toán</td>
                                        @else
                                            <td  class="col-2 align-middle text-success">Đã thanh toán</td>
                                        @endif
                                        <td class="col-2 align-middle"><a href=""><button type="button" class="btn btn-secondary btn-sm">Update</button></a> <br><br>
                                            <a href=""><button type="button" class="btn btn-secondary btn-sm">Hủy</button></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <div class="phantrang">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
