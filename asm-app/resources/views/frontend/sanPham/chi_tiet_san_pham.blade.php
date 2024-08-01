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
                                        <img src="assets/images/product-details/pro-details-small-img-1.png" alt="Product Thumnail">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-2.png" alt="Product Thumnail">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-3.png" alt="Product Thumnail">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-4.png" alt="Product Thumnail">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-details-small-img">
                                        <img src="assets/images/product-details/pro-details-small-img-5.png" alt="Product Thumnail">
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
                                    <div class="easyzoom easyzoom--overlay">
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
                    <h2>New Modern Chair</h2>
                    <div class="product-details-price">
                        <span class="old-price">$25.89 </span>
                        <span class="new-price">$20.25</span>
                    </div>
                    
                    
                    <div class="product-details-action-wrap">
                        <div class="product-quality">
                            <input class="cart-plus-minus-box input-text qty text" name="qtybutton" value="1">
                        </div>
                        <div class="single-product-cart btn-hover">
                            <a href="#">Add to cart</a>
                        </div>
                
                    </div>
                    <div class="product-details-meta">
                        <ul>
                            <li><span class="title">SKU:</span> Ch-256xl</li>
                            <li><span class="title">Category:</span>
                                <ul>
                                    <li><a href="#">Office</a>,</li>
                                    <li><a href="#">Home</a></li>
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
        </div>
    </div>
</div>
@endsection