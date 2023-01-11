@extends('home.master')

@section('content')


{{--    <!-- main -->--}}
{{--    <main class="profile-user-page default">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="col-12">--}}
{{--                                <h1 class="title-tab-content">اطلاعات شخصی</h1>--}}
{{--                            </div>--}}
{{--                            <div class="content-section default">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-sm-12 col-md-6">--}}
{{--                                        <p>--}}
{{--                                            <span class="title">نام و نام خانوادگی :</span>--}}
{{--                                            <span>{{$user->name}}</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6">--}}
{{--                                        <p>--}}
{{--                                            <span class="title">پست الکترونیک :</span>--}}
{{--                                            <span>{{$user->email}}</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-sm-12 col-md-6">--}}
{{--                                        <p>--}}
{{--                                            <span class="title">کد ملی :</span>--}}
{{--                                            <span>{{$user->national_code}}</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6">--}}
{{--                                        <p>--}}
{{--                                            <span class="title">دریافت خبرنامه :</span>--}}
{{--                                            @if($user->Newsletters)--}}
{{--                                                <span>بله</span>--}}
{{--                                            @else--}}
{{--                                                <span>خیر</span>--}}
{{--                                            @endif--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6">--}}
{{--                                        <p>--}}
{{--                                            <span class="title">شماره کارت :</span>--}}
{{--                                            <span>{{$user->number_card}}</span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 text-center">--}}
{{--                                        <a href="{{route('profile.user.edit' , $user->name)}}" class="btn-link-border form-account-link">--}}
{{--                                            ویرایش اطلاعات شخصی--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="col-12">--}}
{{--                                <h1 class="title-tab-content">لیست آخرین علاقمندی ها</h1>--}}
{{--                            </div>--}}
{{--                            <div class="content-section default">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12">--}}
{{--                                        <div class="profile-recent-fav-row">--}}
{{--                                            <a href="#" class="profile-recent-fav-col profile-recent-fav-col-thumb">--}}
{{--                                                <img src="/assets/img/cart/4560621.jpg"></a>--}}
{{--                                            <div class="profile-recent-fav-col profile-recent-fav-col-title">--}}
{{--                                                <a href="#">--}}
{{--                                                    <h4 class="profile-recent-fav-name">--}}
{{--                                                        گوشی موبایل اپل مدل iPhone XR دو سیم کارت ظرفیت 256 گیگابایت--}}
{{--                                                    </h4>--}}
{{--                                                </a>--}}
{{--                                                <div class="profile-recent-fav-price">ناموجود</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="profile-recent-fav-col profile-recent-fav-col-actions">--}}
{{--                                                <button class="btn-action btn-action-remove">--}}
{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="profile-recent-fav-row">--}}
{{--                                            <a href="#" class="profile-recent-fav-col profile-recent-fav-col-thumb">--}}
{{--                                                <img src="/assets/img/cart/3794614.jpg"></a>--}}
{{--                                            <div class="profile-recent-fav-col profile-recent-fav-col-title">--}}
{{--                                                <a href="#">--}}
{{--                                                    <h4 class="profile-recent-fav-name">--}}
{{--                                                        گوشی موبایل اپل مدل iPhone XR دو سیم کارت ظرفیت 256 گیگابایت--}}
{{--                                                    </h4>--}}
{{--                                                </a>--}}
{{--                                                <div class="profile-recent-fav-price">ناموجود</div>--}}
{{--                                            </div>--}}
{{--                                            <div class="profile-recent-fav-col profile-recent-fav-col-actions">--}}
{{--                                                <button class="btn-action btn-action-remove">--}}
{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 text-center">--}}
{{--                                        <a href="#" class="btn-link-border form-account-link">--}}
{{--                                            مشاهده و ویرایش لیست مورد علاقه--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-12">--}}
{{--                            <h1 class="title-tab-content">آخرین سفارش ها</h1>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 text-center">--}}
{{--                            <div class="content-section pt-5 pb-5">--}}
{{--                                <div class="icon-empty">--}}
{{--                                    <i class="now-ui-icons travel_info"></i>--}}
{{--                                </div>--}}
{{--                                <h1 class="text-empty">موردی برای نمایش وجود ندارد!</h1>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">--}}
{{--                    <div class="profile-box">--}}
{{--                        <div class="profile-box-header">--}}
{{--                            <div class="profile-box-avatar">--}}
{{--                                <img src="/assets/img/svg/user.svg" alt="">--}}
{{--                            </div>--}}
{{--                            <button data-toggle="modal" data-target="#myModal" class="profile-box-btn-edit">--}}
{{--                                <i class="fa fa-pencil"></i>--}}
{{--                            </button>--}}
{{--                            <!-- Modal Core -->--}}
{{--                            <div class="modal-share modal-width-custom modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
{{--                                            <h4 class="modal-title" id="myModalLabel">تغییر نمایه کاربری شما</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <ul class="profile-avatars default text-center">--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/user.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-1.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-2.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-3.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-4.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-5.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-6.svg"></img>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <img class="profile-avatars-item" src="/assets/img/svg/avatar-7.svg"></img>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Modal Core -->--}}
{{--                        </div>--}}
{{--                        <div class="profile-box-username">{{$user->name}}</div>--}}
{{--                        <div class="profile-box-tabs">--}}
{{--                            @if(Route::has('password.request'))--}}
{{--                            <a href="{{route('password.request')}}" class="profile-box-tab profile-box-tab-access">--}}
{{--                                <i class="now-ui-icons ui-1_lock-circle-open"></i>--}}
{{--                                تغییر رمز--}}
{{--                            </a>--}}
{{--                            @endif--}}
{{--                            <a href="#" class="profile-box-tab profile-box-tab--sign-out" onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                <i class="now-ui-icons media-1_button-power"></i>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                                    @csrf--}}
{{--                                </form>--}}
{{--                                خروج از حساب--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="responsive-profile-menu show-md">--}}
{{--                        <div class="btn-group">--}}
{{--                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <i class="fa fa-navicon"></i>--}}
{{--                                حساب کاربری شما--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right text-right">--}}
{{--                                <a href="profile.html" class="dropdown-item  active-menu">--}}
{{--                                    <i class="now-ui-icons users_single-02"></i>--}}
{{--                                    پروفایل--}}
{{--                                </a>--}}
{{--                                <a href="profile-orders.html" class="dropdown-item">--}}
{{--                                    <i class="now-ui-icons shopping_basket"></i>--}}
{{--                                    همه سفارش ها--}}
{{--                                </a>--}}
{{--                                <a href="profile-orders-return.html" class="dropdown-item">--}}
{{--                                    <i class="now-ui-icons files_single-copy-04"></i>--}}
{{--                                    درخواست مرجوعی--}}
{{--                                </a>--}}
{{--                                <a href="profile-favorites.html" class="dropdown-item">--}}
{{--                                    <i class="now-ui-icons ui-2_favourite-28"></i>--}}
{{--                                    لیست علاقمندی ها--}}
{{--                                </a>--}}
{{--                                <a href="profile-personal-info.html" class="dropdown-item">--}}
{{--                                    <i class="now-ui-icons business_badge"></i>--}}
{{--                                    اطلاعات شخصی--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="profile-menu hidden-md">--}}
{{--                        <div class="profile-menu-header">حساب کاربری شما</div>--}}
{{--                        <ul class="profile-menu-items">--}}
{{--                            <li>--}}
{{--                                <a href="{{route('profile.user.index')}}" class="{{isActive(['profile.user.index'])}}">--}}
{{--                                    <i class="now-ui-icons users_single-02"></i>--}}
{{--                                    پروفایل--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="profile-orders.html">--}}
{{--                                    <i class="now-ui-icons shopping_basket"></i>--}}
{{--                                    همه سفارش ها--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="profile-orders-return.html">--}}
{{--                                    <i class="now-ui-icons files_single-copy-04"></i>--}}
{{--                                    درخواست مرجوعی--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="profile-favorites.html">--}}
{{--                                    <i class="now-ui-icons ui-2_favourite-28"></i>--}}
{{--                                    لیست علاقمندی ها--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="profile-personal-info.html">--}}
{{--                                    <i class="now-ui-icons business_badge"></i>--}}
{{--                                    اطلاعات شخصی--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
{{--    <!-- main -->--}}








    <!-- head -->
    <section class="section section--head">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h1 class="section__title section__title--head">پروفایل</h1>
                </div>

                <div class="col-12 col-xl-6">
                    <ul class="breadcrumb">
                        <li class="breadcrumb__item"><a href="index.html">صفحه اصلی</a></li>
                        <li class="breadcrumb__item breadcrumb__item--active">پروفایل</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end head -->

    <!-- profile -->
    <div class="catalog catalog--page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="profile">
                        <div class="profile__user">
                            <div class="profile__avatar">
                                <img src="img/avatar.svg" alt="">
                            </div>
                            <div class="profile__meta">
                                <h3>{{$user->name }}</h3>
                                <span>{{$user->email}}</span>
                                @if(Route::has('password.request'))
                                <div><a href="{{route('password.request')}}" style="color: #d9910a; margin-top: 5px; font-size: 12px">تغییر رمز ورود</a></div>
                                @endif
                            </div>
                        </div>

                        <!-- tabs nav -->
                        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">پروفایل</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-2" aria-selected="false">فیلم های مورد علاقه</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-4" aria-selected="false">سریال های مورد علاقه</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">تنظیمات</a>
                            </li>

                        </ul>
                        <!-- end tabs nav -->

                        <a class="profile__logout" href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span>خارج شوید</span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"></path></svg>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div class="row row--grid">
                        @if(auth()->user()->isActive())
                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>زمان اعتبار  </span>
                                <p> تا {{\Carbon\Carbon::parse(auth()->user()->viptime)->diffInDays()}} روز دیگر </p>
                            </div>
                        </div>
                        @else
                                <div class="col-12 col-sm-6 col-xl-3">
                                    <div class="stats">
                                        <span> عضو ویژه نیستید</span>
                                        <p><b>باید اعتبار خریداری کنید</b></p>
                                    </div>
                                </div>
                        <!-- end stats -->
                        @endif
                        <!-- stats -->
                            <div class="col-12 col-sm-6 col-xl-3">
                                <div class="stats">
                                    <span>امتیازات</span>
                                    <p><a href="#">{{$user->interests->count()}}</a></p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg>
                                </div>
                            </div>
                        <!-- end stats -->

                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>نظرات من</span>
                                <p><a href="#">{{$user->comments->count()}}</a></p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8,11a1,1,0,1,0,1,1A1,1,0,0,0,8,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,12,11Zm4,0a1,1,0,1,0,1,1A1,1,0,0,0,16,11ZM12,2A10,10,0,0,0,2,12a9.89,9.89,0,0,0,2.26,6.33l-2,2a1,1,0,0,0-.21,1.09A1,1,0,0,0,3,22h9A10,10,0,0,0,12,2Zm0,18H5.41l.93-.93a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.7A8,8,0,1,1,12,20Z"></path></svg>
                            </div>
                        </div>
                        <!-- end stats -->

                        <!-- stats -->
                        <div class="col-12 col-sm-6 col-xl-3">
                            <div class="stats">
                                <span>امتیازات</span>
                                <p><a href="#">{{$user->interests->count()}}</a></p>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg>
                            </div>
                        </div>
                        <!-- end stats -->

                        <!-- dashbox -->
                        <div class="col-12 col-xl-12">
                            <div class="dashbox">
                                <div class="dashbox__title">
                                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,2a1,1,0,0,0-1,1V5H18V3a1,1,0,0,0-2,0V4H8V3A1,1,0,0,0,6,3V5H4V3A1,1,0,0,0,2,3V21a1,1,0,0,0,2,0V19H6v2a1,1,0,0,0,2,0V20h8v1a1,1,0,0,0,2,0V19h2v2a1,1,0,0,0,2,0V3A1,1,0,0,0,21,2ZM6,17H4V15H6Zm0-4H4V11H6ZM6,9H4V7H6Zm10,9H8V13h8Zm0-7H8V6h8Zm4,6H18V15h2Zm0-4H18V11h2Zm0-4H18V7h2Z"/></svg> لیست اشتراک های موجود برای شما</h3>

                                    <div class="dashbox__wrap">
                                        <a class="dashbox__refresh" href="#"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21,11a1,1,0,0,0-1,1,8.05,8.05,0,1,1-2.22-5.5h-2.4a1,1,0,0,0,0,2h4.53a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4.77A10,10,0,1,0,22,12,1,1,0,0,0,21,11Z"></path></svg></a>
                                    </div>
                                </div>

                                <div class="dashbox__table-wrap dashbox__table-wrap--1">
                                    <table class="main__table main__table--dash">
                                        <thead>
                                        <tr>
                                            <th>عنوان اشتراک</th>
                                            <th>زمان اشتراک (به ماه)</th>
                                            <th>قیمت به ریال</th>
                                            <th>اقدام به خرید</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($plans as $plan)
                                            @if($plan->status)
                                              <tr>
                                            <td>
                                                <div class="main__table-text">{{$plan->title}}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{$plan->time_month}}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text">{{number_format($plan->price)}}</div>
                                            </td>
                                            <td>
                                                <div class="main__table-text"><a href="{{route('profile.vip' , $plan->time_month)}}">خرید اشتراک</a></div>
                                            </td>
                                        </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end dashbox -->

                    </div>
                </div>

                <div class="tab-pane fade" id="tab-4" role="tabpanel">
                    <!-- favorites -->
                    <div class="row row--grid">

                        @foreach($interests  as $interest)
                            @php
                                if ($interest->interestable_type == "App\Models\Video")
                                {
                                    $inter = $interest;
                                    $film = $videos->where('video_id' , $inter->interestable_id)->first();
                                }else
                                    {
                                        $inter = "null";
                                    }
                            @endphp
                            @if($inter != "null")
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <div class="card card--favorites">
                                    <a href="{{route('single_film',$film->original_title)}}" class="card__cover">
                                        <img src="{{$film->image}}" alt="">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </a>
                                    <form action="{{route('interest-video')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$film->original_title}}" name="title">
                                        <input type="hidden" value="{{$film->video_id}}" name="interestable_id">
                                        <input type="hidden" value="{{get_class($film)}}" name="interestable_type">
                                        <button class="card__add" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg></button>
                                    </form>
                                    <span class="card__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.3</span>
                                    <h3 class="card__title"><a href="{{route('single_film',$film->original_title)}}">{{$film->original_title}}</a></h3>


                                        @php
                                        $genre = $genres->where('video_id' , $film->video_id)->all();
                                        @endphp
                                    <ul class="card__list">
                                        @foreach($genre as $gen)
                                        <li>{{$gen->genre_title}}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            @endif


                        @endforeach


                    </div>
                    <!-- end favorites -->

                    <!-- paginator -->
                    <div class="row">
                        <div class="col-12">
                            <div class="catalog__paginator-wrap">
                                <span class="catalog__pages">12 از 144</span>

                                <ul class="catalog__paginator">
                                    <li>
                                        <a href="#">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>

                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li>
                                        <a href="#">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end paginator -->
                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                    <!-- favorites -->
                    <div class="row row--grid">

                        @foreach($interests  as $interest)
                            @php
                                if ($interest->interestable_type == "App\Models\Serial")
                                {
                                    $int = $interest;
                                    $serial = $serials->where('serial_id' , $int->interestable_id)->first();
                                }
                                else{
                                   $serial = "null";
                                }

                            @endphp
                           @if($serial != "null")
                            <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                                <div class="card card--favorites">
                                    <a href="{{route('single_serial', $serial->original_title)}}" class="card__cover">
                                        <img src="{{$serial->img}}" alt="">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11 1C16.5228 1 21 5.47716 21 11C21 16.5228 16.5228 21 11 21C5.47716 21 1 16.5228 1 11C1 5.47716 5.47716 1 11 1Z" stroke-linecap="round" stroke-linejoin="round"/><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0501 11.4669C13.3211 12.2529 11.3371 13.5829 10.3221 14.0099C10.1601 14.0779 9.74711 14.2219 9.65811 14.2239C9.46911 14.2299 9.28711 14.1239 9.19911 13.9539C9.16511 13.8879 9.06511 13.4569 9.03311 13.2649C8.93811 12.6809 8.88911 11.7739 8.89011 10.8619C8.88911 9.90489 8.94211 8.95489 9.04811 8.37689C9.07611 8.22089 9.15811 7.86189 9.18211 7.80389C9.22711 7.69589 9.30911 7.61089 9.40811 7.55789C9.48411 7.51689 9.57111 7.49489 9.65811 7.49789C9.74711 7.49989 10.1091 7.62689 10.2331 7.67589C11.2111 8.05589 13.2801 9.43389 14.0401 10.2439C14.1081 10.3169 14.2951 10.5129 14.3261 10.5529C14.3971 10.6429 14.4321 10.7519 14.4321 10.8619C14.4321 10.9639 14.4011 11.0679 14.3371 11.1549C14.3041 11.1999 14.1131 11.3999 14.0501 11.4669Z" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </a>
                                    <form action="{{route('interest-video')}}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$serial->original_title}}" name="title">
                                        <input type="hidden" value="{{$serial->serial_id}}" name="interestable_id">
                                        <input type="hidden" value="{{get_class($serial)}}" name="interestable_type">
                                        <button class="card__add" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,2H8A3,3,0,0,0,5,5V21a1,1,0,0,0,.5.87,1,1,0,0,0,1,0L12,18.69l5.5,3.18A1,1,0,0,0,18,22a1,1,0,0,0,.5-.13A1,1,0,0,0,19,21V5A3,3,0,0,0,16,2Zm1,17.27-4.5-2.6a1,1,0,0,0-1,0L7,19.27V5A1,1,0,0,1,8,4h8a1,1,0,0,1,1,1Z"></path></svg></button>
                                    </form>                                    <span class="card__rating"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68A1,1,0,0,0,6.9,21.44L12,18.77l5.1,2.67a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.88l.72,4.2-3.76-2a1.06,1.06,0,0,0-.94,0l-3.76,2,.72-4.2a1,1,0,0,0-.29-.88l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z"/></svg> 8.3</span>
                                    <h3 class="card__title"><a href="{{route('single_serial',$serial->original_title)}}">{{$serial->original_title}}</a></h3>

                                    @php
                                        $s_genre = $s_genres->where('serial_id' , $serial->serial_id)->all();
                                    @endphp
                                    <ul class="card__list">
                                        @foreach($s_genre as $gens)
                                            <li>{{$gens->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach


                    </div>
                    <!-- end favorites -->

                    <!-- paginator -->
                    <div class="row">
                        <div class="col-12">
                            <div class="catalog__paginator-wrap">
                                <span class="catalog__pages">12 از 144</span>

                                <ul class="catalog__paginator">
                                    <li>
                                        <a href="#">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1992 5.3645L0.75 5.3645" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.17822 0.602051L13.1993 5.36417L8.17822 10.1271" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>

                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li>
                                        <a href="#">
                                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.75 5.36475L13.1992 5.36475" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.771 10.1271L0.749878 5.36496L5.771 0.602051" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end paginator -->
                </div>



                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="sign__wrap">
                                <div class="row">
                                    <!-- details form -->
                                    <div class="col-12 col-lg-12">
                                        <form method="post" action="{{route('profile.user.update',$user->id)}}" class="sign__form sign__form--profile sign__form--first">
                                            @csrf
                                            @method('patch')
                                            <div class="row">
                                                <div class="col-12">
                                                    <h4 class="sign__title">جزئیات پروفایل</h4>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                    <div class="sign__group">
                                                        <label class="sign__label" for="username"> نام کاربری فعلی</label>
                                                        <input id="username" type="text"  class="sign__input" value="{{$user->name}}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                    <div class="sign__group">
                                                        <label class="sign__label" for="email">ایمیل فعلی</label>
                                                        <input id="email" type="text"  class="sign__input" value="{{$user->email}}">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                    <div class="sign__group">
                                                        <label class="sign__label" for="firstname">نام کاربری جدید</label>
                                                        <input id="firstname" type="text" name="name" class="sign__input" placeholder="نام جدید وارد کن">
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 col-lg-12 col-xl-6">
                                                    <div class="sign__group">
                                                        <label class="sign__label" for="lastname">ایمیل جدید</label>
                                                        <input id="lastname" type="email" name="email" class="sign__input" placeholder="ایمیل جدید وارد کن">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="sign__btn" type="submit">اعمال تغییرات</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- end details form -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </div>
    <!-- end profile -->

    <!-- partners -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partners owl-carousel">
                        <a href="#" class="partners__img">
                            <img src="img/partners/3docean-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/activeden-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/audiojungle-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/codecanyon-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/photodune-light-background.png" alt="">
                        </a>

                        <a href="#" class="partners__img">
                            <img src="img/partners/themeforest-light-background.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end partners -->


@endsection
