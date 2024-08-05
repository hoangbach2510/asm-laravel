@extends('layout.main')
@section('content')
<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12">
                <div class="shop-topbar-wrapper mb-40">
                    <div class="shop-topbar-left">
                        
                    </div>
                    <div class="shop-topbar-right">
                        <div class="shop-sorting-area">
                            <select class="nice-select nice-select-style-1">
                                @foreach ($danh_mucs as $item)
                                <option value="{{ $item->id }}" @if($item->id == old('danh_muc_id')) selected @endif>{{ $item->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="shop-view-mode nav">
                            <a class="active" href="#shop-1" data-bs-toggle="tab"><i class=" ti-layout-grid3 "></i> </a>
                            <a href="#shop-2" data-bs-toggle="tab" class=""><i class=" ti-view-list-alt "></i></a>
                        </div>
                    </div>
                </div>
                <div class="shop-bottom-area">
                    <div class="tab-content jump">
                        <div id="shop-1" class="tab-pane active">
                            <div class="row">
                                @foreach ($san_phams as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                        <div class="product-img img-zoom mb-25">
                                            <a href="product-details.html">
                                                <img src="{{Storage::url($item->hinh_anh)}}" width="280" height="280" alt="product"/>
                                            </a>
                                            <div class="product-badge badge-top badge-right badge-pink">
                                                <span>-{{$item->khuyen_mai}}</span>
                                            </div>
                                            <div class="product-action-wrap">
                                                <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}"><i class="pe-7s-look"></i></a>
                                                </button>
                                            </div>
                                            <div class="product-action-2-wrap">
                                                
                                                    
                                                @if ($item->so_luong>0)
                                                <input type="hidden"  name="_token" value="{{ csrf_token() }}" />
                                                <button data-id="{{$item->id}}" onclick="themGioHang({{$item->id}},{{$item->gia_khuyen_mai}})"class="product-action-btn-2" title="Thêm Vào Giỏ Hàng"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                               
                                            </div>
                                            @else
                                            <button class="btn-icon btn-add-cart product-type-simple" disabled><span>Tạm thời hết hàng</span></button>
                                            @endif
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}">{{$item->ten_san_pham}}</a></h3>
                                            <div class="product-price">
                                                <span class="old-price">{{number_format($item->gia_san_pham, 0, ',', '.')}}đ </span>
                                                <span class="new-price">{{number_format($item->gia_khuyen_mai, 0, ',', '.')}}đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                                    <ul>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="next" href="#"><i class=" ti-angle-double-right "></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection