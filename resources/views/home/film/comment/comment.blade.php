@extends('home.master')
@section('content')

    <!-- main -->
    <main class="single-product default">
        <form action="{{route('comment-send', $product->slug)}}" method="post" class="px-5">
            @csrf
            <input type="hidden" name="commentable_id" value="{{$product->id}}">
            <input type="hidden" name="commentable_type" value="{{get_class($product)}}">
            <input type="hidden" name="parent" value="0">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ul class="breadcrumb">
                                <li>
                                    <a href="#"><span>فروشگاه اینترنتی تاپ کالا</span></a>
                                </li>
                                @foreach($product->categories as $pro)
                                    <li>
                                        <a href="{{route('categoryList',$pro->slug)}}"><span>{{$pro->title}}</span></a>
                                    </li>
                                @endforeach
                                <li>
                                    <span>{{$product->title}}</span>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <article class="product">
                            <div class="row mb-5">
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 section-product-gallery">
                                    <div class="product-gallery default text-center">
                                        <a href="{{route('product-single',$product->slug)}}"><img src="{{$product->image}}" width="411" /></a>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
                                    @include('layouts.error')
                                    <div class="product-title default">
                                        <h1>
                                            {{$product->title}}
                                            <span>{!! $product->description !!}</span></h1>

                                    </div>
                                    <div class="comments-product-attributes px-3">
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">کیفیت ساخت</div>
                                                <input name="quality" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">ارزش خرید به نسبت قیمت
                                                </div>
                                                <input name="buying_price" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">نوآوری</div>
                                                <input name="innovation" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">امکانات و قابلیت ها</div>
                                                <input name="possibilities" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">سهولت استفاده</div>
                                                <input name="Easy_to_use" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                            <div class="col-sm-6 col-12 mb-3">
                                                <div class="comments-product-attributes-title">طراحی و ظاهر</div>
                                                <input name="design" id="ex19" type="text" data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3, 4, 5]"
                                                       data-slider-ticks-labels='["خیلی بد", "بد", "معمولی","خوب","عالی"]'
                                                       data-slider-min="1" data-slider-max="5" data-slider-step="1"
                                                       data-slider-value="3" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row comments-add-col--content">
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-account-title">عنوان نظر شما (اجباری)</div>
                                            <div class="form-account-row">
                                                <input name="title" class="input-field text-right" type="text"
                                                       placeholder="عنوان نظر خود را بنویسید">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 tag-input-st">
                                            <div class="form-account-title">نقاط قوت
                                                <span class="cl-circle-title cl-primary"></span>
                                            </div>
                                            <div class="form-account-row ps-relative">
                                                <input name="point_positive"
                                                       type="text" id="strengths-points-input" data-addui='tags' data-enter='true'>
                                                <button id="add-strengths-point" class="add-points">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 tag-input-st tag-input-weak">
                                            <div class="form-account-title">نقاط ضعف
                                                <span class="cl-circle-title cl-red"></span>
                                            </div>
                                            <div class="form-account-row ps-relative">
                                                <input name="point_negative" type="text" id="weak-points-input" data-addui='tags' data-enter='true'>
                                                <button id="add-weak-point" class="add-points">+</button>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5">
                                            <div class="form-account-title">متن نظر شما (اجباری)</div>
                                            <div class="form-account-row">
                                                    <textarea name="comment" class="input-field text-right" rows="5"
                                                              placeholder="متن خود را بنویسید"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 px-0">
                                            <button type="submit" class="btn btn-primary btn-no-icon">
                                                ثبت نظر
                                            </button>
                                            <p>با “ثبت نظر” موافقت خود را با <a href="/page/comments-rules/"
                                                                                class="btn-link-spoiler" target="_blank">قوانین
                                                    انتشار محتوا</a> در دیجی‌کالا اعلام می‌کنم.</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h3>دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.</h3>
                                    <div>
                                        <p>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</p>
                                        <p>فارسی بنویسید و از کیبورد فارسی استفاده کنید. بهتر است از فضای خالی (Space)
                                            بیش‌از‌حدِ معمول، شکلک یا ایموجی استفاده نکنید و از کشیدن حروف یا کلمات با
                                            صفحه‌کلید بپرهیزید.</p>
                                        <p>نظرات خود را براساس تجربه و استفاده‌ی عملی و با دقت به نکات فنی ارسال کنید؛
                                            بدون
                                            تعصب به محصول خاص، مزایا و معایب را بازگو کنید و بهتر است از ارسال نظرات
                                            چندکلمه‌‌ای خودداری کنید.</p>
                                        <p>بهتر است در نظرات خود از تمرکز روی عناصر متغیر مثل قیمت، پرهیز کنید.</p>
                                        <p>به کاربران و سایر اشخاص احترام بگذارید. پیام‌هایی که شامل محتوای توهین‌آمیز و
                                            کلمات نامناسب باشند، حذف می‌شوند.</p>
                                        <p>از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل شماره تماس،
                                            ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.</p>
                                        <p>با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در این بخش
                                            خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.</p>
                                        <p>هرگونه نقد و نظر در خصوص سایت دیجی‌کالا، خدمات و درخواست کالا را با ایمیل
                                            <a href="mailto:info@digikala.com">
                                                info@digikala.com
                                            </a>
                                            یا با شماره‌ی

                                            <a href="tel: +982161930000">
                                                ۶۱۹۳۰۰۰۰ - ۰۲۱
                                            </a>
                                            در میان بگذارید و از نوشتن آن‌ها در بخش نظرات خودداری کنید.</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!-- main -->



@endsection
