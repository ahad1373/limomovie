<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/slider-radio.css">
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/plyr.css">
    <link rel="stylesheet" href="/css/main.css">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="icon/favicon-32x32.png">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Dmitry Volkov">
    <title>FlixTV – فیلم ها و نمایش های تلویزیونی ، قالب HTML سینمای آنلاین</title>

</head>

<body>
<!-- header (relative style) -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <button class="header__menu" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <a href="/" class="header__logo">
                        <img src="/img/logo.svg" alt="فیلم ها و نمایش های تلویزیونی ، قالب HTML سینمای آنلاین">
                    </a>

                    <ul class="header__nav">
                        <li class="header__nav-item">
                            <a class="header__nav-link" href="/" >
                                صفحه اصلی</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="header__nav-item">
                                <a href="/{{$category->slug}}" class="header__nav-link">{{$category->title}}</a>
                            </li>
                        @endforeach


{{--                        <li class="header__nav-item">--}}
{{--                            <a class="header__nav-link" href="{{route('film_pagination')}}" >--}}
{{--                                فیلم</a>--}}
{{--                        </li>--}}
                        <li class="header__nav-item">
                            <a class="header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.93893 14.3033C6.08141 14.3033 5.38477 13.6067 5.38477 12.7505C5.38477 11.8943 6.08141 11.1963 6.93893 11.1963C7.79644 11.1963 8.49309 11.8943 8.49309 12.7505C8.49309 13.6067 7.79644 14.3033 6.93893 14.3033Z"/><path d="M12.7501 14.3033C11.8926 14.3033 11.1959 13.6067 11.1959 12.7505C11.1959 11.8943 11.8926 11.1963 12.7501 11.1963C13.6076 11.1963 14.3042 11.8943 14.3042 12.7505C14.3042 13.6067 13.6076 14.3033 12.7501 14.3033Z"/><path d="M18.5608 14.3033C17.7032 14.3033 17.0066 13.6067 17.0066 12.7505C17.0066 11.8943 17.7032 11.1963 18.5608 11.1963C19.4183 11.1963 20.1149 11.8943 20.1149 12.7505C20.1149 13.6067 19.4183 14.3033 18.5608 14.3033Z"/></svg>
                            </a>
                            <ul class="dropdown-menu header__nav-menu header__nav-menu--scroll" aria-labelledby="dropdownMenu3">
                                @guest
                                    @if(Route::has('login'))
                                        <li><a href="{{route('login')}}">وارد شوید</a></li>
                                    @endif
                                    @if(Route::has('register'))
                                        <li><a href="{{route('register')}}">ثبت نام کنید</a></li>
                                    @endif
                                <li><a href="about.html">درباره ما</a></li>
                                <li><a href="contacts.html">تماس با ما</a></li>
                                <li><a href="{{route('admin.')}}" target="_blank">پنل مدیریت</a></li>
                                @else
                                    <li><a href="about.html">درباره ما</a></li>
                                    <li><a href="{{route('profile.user.index')}}">پروفایل</a></li>
                                    <li><a href="contacts.html">تماس با ما</a></li>
                                    <li><a href="{{route('admin.')}}" target="_blank">پنل مدیریت</a></li>
                                @endguest


                            </ul>
                        </li>
                    </ul>

                    <div class="header__actions">
                    @include('home.search.search-header')

                        <button class="header__search" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg>
                        </button>
                        @auth
                            <a href="/profile.html" class="header__user">
                                <span>  {{auth()->user()->name}}</span>
                            </a>

                            <a href="#" class="header__user" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z"/></svg>
                            </a>
                        @else
                            <a href="{{route('login')}}" class="header__user">
                                <span>  وارد شوید</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z"/></svg>
                            </a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
