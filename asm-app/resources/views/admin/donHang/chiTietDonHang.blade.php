@extends('admin.layout.main')
@section('admin.content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <div class="card shadow">
        <div class="card-header">
            <h3 class="text-center" style="color: #000">Thông tin khách hàng</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-3">{{$don_hang->ho_va_ten}}</td>
                    <td class="col-2">{{$don_hang->so_dien_thoai}}</td>
                    <td class="col-3">{{$don_hang->email}}</td>
                    <td class="col-4">{{$don_hang->dia_chi}}</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>

    <div class="card shadow mt-5">
        <div class="card-header">
            <h3 class="text-center" style="color: #000">Thông tin vận chuyển hàng</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Tên người vận chuyển</th>
                    <th>SDT nhận hàng</th>
                    <th>Địa chỉ nhận hàng</th>
                    <th>Ghi chú</th>
                    <th>Hình thức thanh toán</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="col-2">Tống hoàng bách</td>
                    <td class="col-2">{{$don_hang->so_dt_nhan}}</td>
                    <td class="col-3">{{$don_hang->dia_chi_nhan}}</td>
                    <td class="col-3"></td>
                    @if ($don_hang->phuong_thuc_tt==0)
                        <td class="col-2">Ship code</td>
                    @else
                        <td class="col-2">Thanh toán online</td>
                    @endif
                  </tr>
                </tbody>
              </table>
        </div>
    </div>

    <div class="card shadow mt-5">
        <div class="card-header">
            <h3 class="text-center" style="color: #000">Liệt kê chi tiết đơn hàng</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên sản phẩm</th>
                    <th>Phí ship</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($chi_tiet_don_hangs as $index => $item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td class="col-4">{{$item->ten_san_pham}}</td>
                            <td class="col-2">0đ</td>
                            <td class="col-2">{{$item->so_luong}}</td>
                            <td class="col-2">{{number_format($item->don_gia, 0, ',', '.')}}đ</td>
                            <td class="col-2">{{number_format($item->thanh_tien, 0, ',', '.')}}đ</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <div class="">
        <a target="_blank" href="{{ route('don-hang.in-hoa-don', $don_hang->id) }}" class="btn btn-success mt-5 mb-5 float-right">In hóa đơn</a>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
