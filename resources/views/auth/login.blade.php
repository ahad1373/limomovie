@extends('layouts.app')

@section('content')

    <div class="wrapper default">
        <div class="container">
            <div class="row">
                <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                    <div class="account-box">
                        <a href="#" class="logo">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                        <div class="account-box-title text-right">ورود به تاپ کالا</div>
                        @include('layouts.error')
                        <div class="account-box-content">
                            <form class="form-account" action="{{route('login')}}" method="post">
                                @csrf
                                <div class="form-account-title">ایمیل</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                    <input class="input-field" type="email" name="email"
                                           placeholder="ایمیل  خود را وارد نمایید">
                                </div>
                                @if(Route::has('password.request'))
                                    <div class="form-account-title">رمز عبور
                                        <a href="{{route('password.request')}}" class="btn-link-border form-account-link">رمز
                                            عبور خود را فراموش
                                            کرده ام</a>
                                    </div>
                                @endif
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input class="input-field" type="password" name="password"
                                           placeholder="رمز عبور خود را وارد نمایید">
                                </div>
                                <div class="form-account-row form-account-submit">
                                    <div class="parent-btn">
                                        <button class="dk-btn dk-btn-info">
                                            ورود به تاپ کالا
                                            <i class="fa fa-sign-in"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-account-agree">
                                    <label class="checkbox-form checkbox-primary">
                                        <input type="checkbox" checked="checked" id="agree">
                                        <span class="checkbox-check"></span>
                                    </label>
                                    <label for="agree">مرا به خاطر داشته باش</label>
                                </div>
                            </form>
                        </div>
                        <div class="account-box-footer">
                            <span>کاربر جدید هستید؟</span>
                            <a href="{{route('register')}}" class="btn-link-border">ثبت‌نام در
                                تاپ کالا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mini-footer">
            <nav>
                <div class="container">
                    <ul class="menu">
                        <li>
                            <a href="#">درباره تاپ کالا</a>
                        </li>
                        <li>
                            <a href="#">فرصت‌های شغلی</a>
                        </li>
                        <li>
                            <a href="#">تماس با ما</a>
                        </li>
                        <li>
                            <a href="#">همکاری با سازمان‌ها</a>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="copyright-bar">
                <div class="container">
                    <p>
                        استفاده از مطالب فروشگاه اینترنتی تاپ کالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                        کلیه حقوق این سایت متعلق
                        به شرکت نوآوران فن آوازه (فروشگاه آنلاین تاپ کالا) می‌باشد.
                    </p>
                </div>
            </div>
        </footer>
    </div>

@endsection
