@extends('layout.main')
@section('content')
    <!-- mini cart start -->
    <div class="">
        <div class="">
            <a href="{{route('gio-hang.show')}}"><i class="pe-7s-close"></i></a> 
        </div>
    </div>
    <div class="slider-area">
        <div class="slider-active swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1" style="background-image:url(assets/images/slider/slider-bg-1.jpg)">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="slider-content-1 slider-animated-1">
                                        <h3 class="animated">Sản Phẩm Mới</h3>
                                        <h1 class="animated">Mùa Hè <br>Năng Động</h1>
                                        <div class="slider-btn btn-hover">
                                            <a href="{{route('san-pham.san-pham-danh-muc')}}" class="btn animated">
                                                Xem Thêm <i class=" ti-arrow-right "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="hero-slider-img-1 slider-animated-1">
                                        <img class="animated animated-slider-img-1" src="{{asset('assets/images/banner/bannerDemi.webp')}}" alt="">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-1" style="background-image:url(assets/images/slider/slider-bg-1.jpg)">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="slider-content-1 slider-animated-1">
                                        <h3 class="animated">new arrival</h3>
                                        <h1 class="animated">Summer <br>Collection</h1>
                                        <div class="slider-btn btn-hover">
                                            <a href="" class="btn animated">
                                                Shop Now <i class=" ti-arrow-right "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="hero-slider-img-1 slider-animated-1">
                                        <img class="animated animated-slider-img-1" src="{{asset('assets/images/slider/slider-img-1-2.png')}}" alt="">
                                        <div class="product-offer animated">
                                            <h5>30% <span>Off</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-slider-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-img">
                        <img src="assets/images/icon-img/car.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Miễn Phí Ship</h3>
                        <p>Với Tất Cả Sản Phẩm</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-img">
                        <img src="assets/images/icon-img/time.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Hỗ Trợ 24/7</h3>
                        <p>Trả Lời Sớm Nhất</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-img">
                        <img src="assets/images/icon-img/dollar.png" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Hoàn Tiền</h3>
                        <p>Trả Hàng - Hoàn Tiền </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-30">
                <div class="service-wrap" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-img">
                        <img src="{{asset('assets/images/icon-img/discount.png')}}" alt="">
                    </div>
                    <div class="service-content">
                        <h3>Giảm Giá </h3>
                        <p>Sốc Không Giảm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-95">
        <div class="container">
            <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title-timer-wrap bg-white">
                    <div class="section-title-1">
                        <h2>Sản Phẩm Mới Nhất</h2>
                    </div>
                    
                </div>
            </div>
            <div class="container">
            <div class="product-slider-active-1 swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($san_pham_moi_nhat as $item)
                    <div class="swiper-slide">
                        
                        <div class="product-wrap" data-aos="fade-up" data-aos-delay="200">
                            
                            <div class="product-img img-zoom mb-25">
                                <a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}">
                                    <img src="{{Storage::url($item->hinh_anh)}}" width="280" height="280" alt="product">
                                </a>
                                <div class="product-badge badge-top badge-right badge-pink">
                                    <span>-{{$item->khuyen_mai}}%</span>
                                </div>
                                <div class="product-action-wrap">
                            
                                    <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}"></a><i class="pe-7s-look"></i>
                                    </button>
                                </div>
                                <div class="product-action-2-wrap">
                                    @if ($item->so_luong>0)
                                    <input type="hidden"  name="_token" value="{{ csrf_token() }}" />
                                    <button data-id="{{$item->id}}" onclick="themGioHang({{$item->id}},{{$item->gia_khuyen_mai}})" class="product-action-btn-2" title="Thêm Vào Giỏ Hàng"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                    @else
                                    <button class="btn-icon btn-add-cart product-type-simple" disabled><span>Tạm thời hết hàng</span></button>
                                    @endif
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('san-pham.chi-tiet-san-pham',$item->id)}}">{{$item->ten_san_pham}}</a></h3>
                                <div class="product-price">
                                    <span class="old-price">{{number_format($item->gia_san_pham, 0, ',', '.')}}đ</span>
                                    <span class="new-price">{{number_format($item->gia_khuyen_mai, 0, ',', '.')}}đ</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach  
                
                </div>
                
                <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-left"></i></div>
             
                <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i class="fa fa-angle-right"></i></div>
            
            </div>
        </div>
    </div>

        
    </div>
    <div class="product-area pb-60">
        <div class="container">
            <div class="section-title-tab-wrap mb-75">
                <div class="section-title-2" data-aos="fade-up" data-aos-delay="200">
                    <h2>Sản Phẩm Nổi Bật</h2>
                </div>
               
            </div>
            <div class="tab-content jump">
                <div id="pro-1" class="tab-pane active">
                    <div class="row">
                        @foreach ($san_pham_moi_nhat as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                <div class="product-img img-zoom mb-25">
                                    <a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}">
                                        <img src="{{Storage::url($item->hinh_anh)}}" width="280" height="280" alt="product">
                                    </a>
                                    <div class="product-badge badge-top badge-right badge-pink">
                                        <span>-{{$item->khuyen_mai}}%</span>
                                    </div>
                                    <div class="product-action-wrap">
                                
                                        
                                        <button class="product-action-btn-1" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}"><i class="pe-7s-look"></i></a>
                                        </button>
                                    </div>
                                    <div class="product-action-2-wrap">
                                        @if ($item->so_luong>0)
                                    <input type="hidden"  name="_token" value="{{ csrf_token() }}" />
                                    <button data-id="{{$item->id}}" onclick="themGioHang({{$item->id}},{{$item->gia_khuyen_mai}})" class="product-action-btn-2" title="Thêm Vào Giỏ Hàng"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                                    @else
                                    <button class="btn-icon btn-add-cart product-type-simple" disabled><span>Tạm thời hết hàng</span></button>
                                    @endif
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{route('san-pham.chi-tiet-san-pham', $item->id)}}">{{$item->ten_san_pham}}</a></h3>
                                    <div class="product-price">
                                        <span class="old-price">{{number_format($item->gia_san_pham, 0, ',', '.')}}đ</span>
                                        <span class="new-price">{{number_format($item->gia_khuyen_mai, 0, ',', '.')}}đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
        </div>
    </div>
    

  
    <!-- Product Modal end -->
    <!-- Mobile Menu start -->
</div>
<!-- All JS is here -->

@endsection