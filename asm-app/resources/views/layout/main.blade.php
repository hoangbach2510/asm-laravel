<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jul 2024 07:23:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DEMI STORE</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Urdan Minimal eCommerce Bootstrap 5 Template is a stunning eCommerce website template that is the best choice for any online store.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="canonical" href="https://htmldemo.hasthemes.com/urdan/index.html" />

    <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="DEMI STORE" />
    <meta property="og:url" content="https://htmldemo.hasthemes.com/urdan/index.html" />
    <meta property="og:site_name" content="DEMI STORE" />
    <!-- For the og:image content, replace the # with a link of an image -->
    <meta property="og:image" content="#" />
    <meta property="og:description" content="DEMI STORE" />
    <!-- Add site Favicon -->
    <link rel="icon" href="{{asset('assets/images/favicon/demi.webp')}}" sizes="32x32" />
    <link rel="icon" href="{{asset('assets/images/favicon/demi.webp')}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset('assets/images/favicon/cropped-favicon-180x180.png')}}" />
    <meta name="msapplication-TileImage" content="{{asset('assets/images/favicon/cropped-favicon-270x270.png')}}" />

    <!-- All CSS is here
	============================================ -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/vendor/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/easyzoom.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slinky.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>
<body>
<div class="main-wrapper main-wrapper-2">
    <header class="header-area header-responsive-padding header-height-1">
        <div class="header-top d-none d-lg-block bg-gray">
            <div class="container">
                <div class="row align-items-center">
                    
                    
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="logo">
                            <a href="{{route('trang-chu.home')}}"><img src="{{asset('assets/images/logo/demi.webp')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li><a href="{{route('trang-chu.home')}}">Trang Chủ</a>
                                    </li>
                                    <li><a href="about-us.html">Giới Thiệu</a></li>
                                    
                                        
                                    
                                        
                                    
                                    <li><a href="{{route('san-pham.san-pham-danh-muc')}}">Sản Phẩm</a>
                                        
                                        <ul class="sub-menu-style">
                                            <li><a href="{{route('san-pham.san-pham-danh-muc')}}">ÁO KHOÁC LOCAL BRAND</a></li>
                                            
                                        </ul>
                                       
                                    </li>
                                   
                                    
                                    <li><a href="blog.html">Tin Tức</a>
                                    </li>
                                    
                                    <li><a href="contact-us.html">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="header-action-wrap">
                            <div class="header-action-style header-search-1">
                                <a class="search-toggle" href="#">
                                    <i class="pe-7s-search s-open"></i>
                                    <i class="pe-7s-close s-close"></i>
                                </a>
                                <div class="search-wrap-1">
                                    <form action="#">
                                        <input placeholder="Search products…" type="text">
                                        <button class="button-search"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-action-style main-menu">
                                <nav>
                                    <ul>
                                            <li><a title="Tài khoản" href="{{route('tai-khoan.dang-nhap')}}"><i class="pe-7s-user"></i></a>
                                                <ul class="">
                                                    @if (Auth::check())
                                                    <li><a href="?act=thongtintk" style="font-size:13px;">Thông tin tài khoản</a></li>
                                                    @if (Auth::user()->role==0)
                                                        <li><a href="{{route('admin.index')}}" style="font-size:13px;">Quản trị viên</a></li>
                                                    @endif
                                                    <li><a href="?act=lichsumuahang" style="font-size:13px;">Đơn mua</a></li>
                                                    <li><a href="{{route('tai-khoan.dang-xuat')}}" style="font-size:13px;">Đăng xuất</a></li>
                                                    @else
                                                    <li><a href="{{route('tai-khoan.dang-nhap')}}" style="font-size:13px;">Đăng nhập</a></li>
                                                    <li><a href="{{route('tai-khoan.dang-ky')}}" style="font-size:13px;">Đăng ký</a></li>  
                                                    @endif
                                                </ul>
                                            </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-action-style header-action-cart">
                                <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                    <span class="product-count bg-black">01</span>
                                </a>
                            </div>
                            <div class="header-action-style d-block d-lg-none">
                                <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <div class="main-wrapper main-wrapper-2">
    @yield('content')
    </div>
    <footer class="footer-area">
        <div class="bg-gray-2">
            <div class="container">
                <div class="footer-top pt-80 pb-35">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-about mb-40">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="{{asset('assets/images/logo/demi.webp')}}" alt="logo"></a>
                                </div>
                                <p>Lorem ipsum dolor sit amet, cons adipi elit, sed do eiusmod tempor incididunt ut aliqua.</p>
                                <div class="payment-img">
                                    <a href="#"><img src="assets/images/icon-img/payment.png" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                <h3 class="footer-title">Thông Tin</h3>
                                <ul>
                                    <li><a href="about-us.html">Giới Thiệu</a></li>
                                    <li><a href="#">Chi Tiết Giỏ Hàng</a></li>
                                    <li><a href="#">Chính Sách</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Customer Service</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-list mb-40">
                                <h3 class="footer-title">Tài Khoản</h3>
                                <ul>
                                    
                                    <li><a href="#">Lịch Sử Mua Hàng</a></li>
                                    <li><a href="#">Đơn Mua</a></li>
                                    <li><a href="#">Thông Tin Tài Khoản</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                <h3 class="footer-title">Liên Hệ</h3>
                                <ul>
                                    <li><span>Địa Chỉ: </span>Mỹ Đình - Hà Nội </li>
                                    <li><span>Hotline:</span> 0917261473</li>
                                    <li><span>Email: </span>hoangbach2510@gmail.com</li>
                                </ul>
                                <div class="open-time">
                                    <p>Open : <span>8:00 AM</span> - Close : <span>18:00 PM</span></p>
                                    <p>Saturday - Sunday : Close</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-3">
            <div class="container">
                <div class="footer-bottom copyright text-center bg-gray-3">
                    <p>Copyright ©2022 All rights reserved | Made with <i class="fa fa-heart"></i> by <a href="https://hasthemes.com/"> HB</a>.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/js/vendor/modernizr-3.11.7.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/aos.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.j')}}s"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/swiper.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.counterup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slinky.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>


<!-- Mirrored from htmldemo.net/urdan/urdan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jul 2024 07:24:19 GMT -->
</html>