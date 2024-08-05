@extends('layout.main')
@section('content')
<div class="cart-area pt-100 pb-100">
    <div class="container">
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
        <div class="row">
            <div class="col-12">
                <form action="{{route('gio-hang.tiep-tuc-dat-hang')}}" method="POST">
                    @csrf
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="width"></th>
                                        <th class="width-thumbnail">Hình Ảnh</th>
                                        <th class="width-name">Tên Sản Phẩm</th>
                                        <th class="width-price">Giá</th>
                                        <th class="width-quantity">Số Lượng</th>
                                        <th class="width-subtotal">Tổng Giá</th>
                                        <th class="width-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $tong_thanh_toan=0;
                                    @endphp
                                     @foreach ($gio_hangs as $item)
                                    <tr>
                                        
                                        <td class="align-middle text-center"><input type="checkbox" name="select[]" value="{{$item->id}}"></td>
                                        <td class="product-thumbnail">
                                            <a href="{{route('san-pham.chi-tiet-san-pham',$item->san_pham_id)}}"><img src="{{ Storage::url($item->hinh_anh) }}" width="80px" alt="product"></a>
                                        </td>
                                        <td class="product-name">
                                            <h5><a href="{{route('san-pham.chi-tiet-san-pham',$item->san_pham_id)}}">{{$item->ten_san_pham}}</a></h5>
                                        </td>
                                        <td class="product-cart-price"><span class="amount">{{number_format($item->gia_khuyen_mai, 0, ',', '.')}}đ</span></td>
                                     
                                        <td class="col-2">
                                            <div class="product-quality">
                                                <input data-id="{{$item->id}}" type="hidden"  name="id" value="{{$item->id}}">
                                                <input type="hidden" name="gia_khuyen_mai" value="{{$item->gia_khuyen_mai}}">
                                                <input data-id="{{$item->id}}" type="hidden" class="thanhtienjs" name="thanh_tien" value="{{$item->thanh_tien}}">
                                                <div  class="dec qtybutton">-</div>
                                                <input data-id="{{$item->id}}" class="cart-plus-minus-box input-text qty text" name="qtybutton" value="{{$item->so_luong}}" disabled>
                                                <div  class="inc qtybutton">+</div>
                                            </div>
                                        </td>
                                        <td class="text-right thanhTien"><span class="subtotal-price">{{number_format($item->gia_khuyen_mai*$item->so_luong, 0, ',', '.')}}đ</span></td>
                                        <td class="product-remove"><a href="#"><i class=" ti-trash "></i></a></td>
                                    </tr>
                                    
                                        @php
                                            $tong_thanh_toan+=($item->gia_khuyen_mai*$item->so_luong);
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update btn-hover">
                                    <a href="{{ route('san-pham.danh-muc') }}">Tiếp Tục Mua Sắm</a>
                                </div>
                                <div class="cart-clear-wrap">
                                    <div class="cart-clear btn-hover">
                                        <button>Sửa</button>
                                    </div>
                                    <div class="cart-clear btn-hover">
                                        <button type="submit" name="xoa_gio_hang" class="">Xóa giỏ hàng</button>
                                    </div>
                                </div>
                                <div class="cart-clear btn-hover">
                                    <button type="submit" name="tiep_tuc_dat_hang" class="">Tiếp tục đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection