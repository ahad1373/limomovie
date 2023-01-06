@extends('layouts.app')

@section('content')


    <div class="wrapper default">
        <div class="container">
            <div class="row">
                <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                    <div class="account-box">
                        <a href="#" class="logo">
                            <img src="/assets/img/logo.png" alt="">
                        </a>
                        <div class="account-box-title text-right">برای احراز هویت پیغامی به ایمیلتان ارسال کنید</div>
                        @include('layouts.error')
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                ایمیلی برایتان ارسال شد
                            </div>
                        @endif
                        <div class="account-box-content">
                            <form class="form-account" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="form-account-row form-account-submit">
                                    <div class="parent-btn">
                                        <button class="dk-btn dk-btn-info">
                                            ارسال ایمیل
                                            <i class="fa fa-sign-in"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
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




{{--    <div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Verify Your Email address') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please check your email for a verification link.') }}--}}
{{--                    {{ __('If you did not receive the email') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
