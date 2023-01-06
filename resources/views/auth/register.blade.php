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
                        <div class="account-box-title">ثبت‌نام در تاپ کالا</div>
                        @include('layouts.error')
                        <div class="account-box-content">
                            <form class="form-account" action="{{route('register')}}" method="post">
                                @csrf
                                <div class="form-account-title"> نام کاربری</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                    <input class="input-field" type="text" name="name"
                                           placeholder="نام کاربری  خود را وارد نمایید">
                                </div>
                                <div class="form-account-title">پست الکترونیک یا شماره موبایل</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                    <input class="input-field" type="email" name="email"
                                           placeholder="پست الکترونیک  خود را وارد نمایید">
                                </div>
                                <div class="form-account-title">کلمه عبور</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input class="input-field" type="password" name="password"
                                           placeholder="کلمه عبور خود را وارد نمایید">
                                </div>
                                <div class="form-account-title">تکرار کلمه عبور</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input class="input-field" type="password" name="password_confirmation"
                                           placeholder="کلمه عبور خود را تکرار نمایید">
                                </div>
                                <div class="form-account-agree">
                                    <label class="checkbox-form checkbox-primary">
                                        <input type="checkbox" checked="checked">
                                        <span class="checkbox-check"></span>
                                    </label>
                                    <label for="agree">
                                        <a href="#" class="btn-link-border">حریم خصوصی</a> و <a href="#"
                                                                                                class="btn-link-border">شرایط و قوانین</a> استفاده از سرویس های سایت
                                        تاپ کالا را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                                </div>
                                <div class="form-account-row form-account-submit">
                                    <div class="parent-btn">
                                        <button class="dk-btn dk-btn-info">
                                            ثبت نام در تاپ کالا
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="account-box-footer">
                            <span>قبلا در تاپ کالا ثبت‌نام کرده‌اید؟</span>
                            <a href="{{route('login')}}" class="btn-link-border">وارد شوید</a>
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
