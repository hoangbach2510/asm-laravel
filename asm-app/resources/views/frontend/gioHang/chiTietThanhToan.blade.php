@extends('layout.main')
@section('content')

<div class="checkout-main-area pb-100 pt-100">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <li>Vui lòng nhập đầy đủ thông tin hợp lệ !</li>
        </ul>
    </div>
@endif
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

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="checkout-wrap pt-30">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3>Chi Tiết Thanh Toán</h3>
                        <div class="row">
                            <form action="{{route('gio-hang.xac-nhan-dat-hang')}}" method="POST" id="checkout-form">
                                @csrf
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Họ Và Tên<abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="ho_va_ten" class="form-control" value="{{Auth::user()->ho_va_ten}}"/>
                                </div>
                            </div>
                        
                            <div class="col-lg-12">
                                <div class="billing-info mb-20">
                                    <label>Địa Chỉ : <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="dia_chi" class="form-control" value="{{old('dia_chi',Auth::user()->dia_chi)}}"/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="billing-info mb-20">
                                    <label>Số Điện Thoại : <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" name="so_dien_thoai" class="form-control" value="{{old('so_dien_thoai',Auth::user()->so_dien_thoai)}}"/>
                                </div>
                            </div>
                        </div>
                        
                        
                    
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="your-order-area">
                        <h3>Đơn Hàng Của Bạn</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-info-wrap">
                                <div class="your-order-info">
                                    <ul>
                                        <li>Tên Sản Phẩm <span>Giá</span></li>
                                    </ul>
                                </div>
                                @php
                                $tongTien=0;
                                @endphp
                                @foreach ($gio_hang as $item)
                                <div class="your-order-middle">
                                    <ul>
                                        <li>{{$item->ten_san_pham}} x {{$item->so_luong}} <span>{{number_format($item->thanh_tien, 0, ',', '.')}}đ </span></li>
                                        
                                    </ul>
                                </div>
                                
                            
                                <div class="your-order-info order-total">
                                    <ul>
                                        <li>Tổng <span>{{number_format($item->thanh_tien, 0, ',', '.')}}đ</span></li>
                                    </ul>
                                </div>
                            </div>
                            
                            @endforeach
                            <div class="payment-method">
                                <div class="pay-top sin-payment">
                                    <input id="payment_method_1" class="input-radio" type="radio" value="cheque" checked="checked" name="payment_method">
                                    <label for="payment_method_1"> Ship Cod</label>   
                                </div>
                                
                                <div class="pay-top sin-payment">
                                    <input id="payment-method-3" class="input-radio" type="radio" value="cheque" name="payment_method">
                                    <label for="payment-method-3">Thanh Toán Online</label>
                                </div>
                                
                            </div>
                        </div>
                        <br>
                        <div class="Place-order btn-hover">
                        <button type="submit" name="dathang" class="btn btn-success" style="width:100%;">Đặt hàng</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection