@extends('layout.main')
@section('content')
<div class="login-register-area pb-100 pt-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 offset-lg-2">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> Đăng Nhập </h4>
                        </a>
                    </div>
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
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{route('tai-khoan.dang-nhap')}}" method="post">
                                        @csrf
                                        <input name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                                        @error('email')
                                        <p class="Err text-danger">{{ $message }}</p>
                                        @enderror
                                        <input type="password" name="password" placeholder="Mật Khẩu">
                                        @error('password')
                                        <p class="Err text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-footer">
                                            <a href="{{ route('tai-khoan.dang-ky') }}"
                                                class="forget-password text-dark form-footer-left">Bạn chưa có tài khoản? Đăng ký
                                                ngay</a>
                                        </div>
                                        <div class="login-toggle-btn">
                                            <a href="#">Quên Mật Khẩu?</a>
                                        </div>
                                        <div class="button-box btn-hover">
                                            <button type="submit">Đăng Nhập</button>
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