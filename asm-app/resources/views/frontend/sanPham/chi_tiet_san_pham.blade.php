@extends('layout.main')
@section('content')
<div class="product-details-area pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-details-img-wrap product-details-vertical-wrap" data-aos="fade-up" data-aos-delay="200">
                    <div class="product-details-small-img-wrap">
                        <div class="swiper-container product-details-small-img-slider-1 pd-small-img-style">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-1.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-2.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-3.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-4.png" alt="">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pd-prev pd-nav-style"> <i class="ti-angle-up"></i></div>
                        <div class="pd-next pd-nav-style"> <i class="ti-angle-down"></i></div>
                    </div>
                    <div class="swiper-container product-details-big-img-slider-1 pd-big-img-style">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="">
                                            <img src= "{{Storage::url($san_pham->hinh_anh)}}" width="468" height="468" alt="product" >
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/pro-details-large-img-1.png">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/images/product-details/pro-details-zoom-img-2.png">
                                            <img src="assets/images/product-details/pro-details-large-img-2.png" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/pro-details-large-img-2.png">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/images/product-details/pro-details-zoom-img-3.png">
                                            <img src="assets/images/product-details/pro-details-large-img-3.png" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/pro-details-large-img-3.png">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/images/product-details/pro-details-zoom-img-4.png">
                                            <img src="assets/images/product-details/pro-details-large-img-4.png" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/pro-details-large-img-4.png">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="assets/images/product-details/pro-details-zoom-img-5.png">
                                            <img src="assets/images/product-details/pro-details-large-img-5.png" alt="">
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/pro-details-large-img-5.png">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-details-content" data-aos="fade-up" data-aos-delay="400">
                    <h2>{{$san_pham->ten_san_pham}}</h2>
                    <div class="product-details-price">
                        <span class="old-price">{{number_format($san_pham->gia_san_pham, 0, ',', '.')}}đ</span>
                        <span class="new-price">{{number_format($san_pham->gia_khuyen_mai, 0, ',', '.')}}đ</span>
                    </div>
                    
                    
                    <div class="product-details-action-wrap">
                        <div class="product-quality">
                            <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                        </div>
                        <div class="single-product-cart btn-hover">
                            @if ($san_pham->so_luong>0)
                            <input type="hidden"  name="_token" value="{{ csrf_token() }}" />
                            <button data-id="{{$san_pham->id}}" onclick="themGioHang({{$san_pham->id}},{{$san_pham->gia_khuyen_mai}})"class="btn btn-warning" title="Add To Cart"><i class="pe-7s-cart"></i> Thêm Vào Giỏ Hàng</button>
                            @endif
                        </div>
                
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">Mã Loại:</span> NM-{{$san_pham->id}}</li>
                            <li><span class="title">Danh Mục:</span>
                                <ul>
                                    <li><a href="{{route('san-pham.san-pham-danh-muc',$san_pham->danh_muc_id)}}" class="product-category">{{$danh_muc->ten_danh_muc}}</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="social-icon-style-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        
            <div class="description-review-area pb-85">
                <div class="container">
                    <div class="description-review-topbar nav" data-aos="fade-up" data-aos-delay="200">
                        <a class="active" data-bs-toggle="tab" href="#des-details1"> Mô Tả </a>
                        
                        <a data-bs-toggle="tab" href="#des-details3" class=""> Đánh Giá</a>
                    </div>
                    <div class="tab-content">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-content text-center">
                                <p data-aos="fade-up" data-aos-delay="200">{{$san_pham->mo_ta}} </p>
                                
                            </div>
                        </div>
                        
                        <div id="des-details3" class="tab-pane">
                            <div class="review-wrapper">
                                <h3>1 đánh giá cho {{$san_pham->ten_san_pham}}</h3>
                               
                            <div class="ratting-form-wrapper">
                                <h3>Add a Review</h3>
                                <p>Your email address will not be published. Required fields are marked <span>*</span></p>
                                <div class="your-rating-wrap">
                                    <span>Your rating</span>
                                    <div class="your-rating">
                                        <a href="#"><i class="ti-star"></i></a>
                                        <a href="#"><i class="ti-star"></i></a>
                                        <a href="#"><i class="ti-star"></i></a>
                                        <a href="#"><i class="ti-star"></i></a>
                                        <a href="#"><i class="ti-star"></i></a>
                                    </div>
                                </div>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="rating-form-style mb-15">
                                                    <label>Name <span>*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="rating-form-style mb-15">
                                                    <label>Email <span>*</span></label>
                                                    <input type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-15">
                                                    <label>Your review <span>*</span></label>
                                                    <textarea name="Your Review"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="save-email-option">
                                                    <p><input type="checkbox"> <label>Save my name, email, and website in this browser for the next time I comment.</label></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <input type="submit" value="Submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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