@extends('home.master')
@section('content')

        <main class="search-page default">
            <div class="container">
                <div class="row">
                    <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3 order-1">
                        <div class="box">
                            <div class="box-header">دسته بندی نتایج</div>
                            <div class="box-content category-result">
                                <ul>
                                    <li><a href="#">کالای دیجیتال</a>
                                        <ul>
                                            <li><a href="#">لوازم جانبی گوشی</a></li>
                                            <li><a href="#">گوشی موبایل</a>
                                                <ul>
                                                    <li><a href="#">هوآوی</a></li>
                                                    <li><a href="#">سامسونگ</a></li>
                                                    <li><a href="#">ال جی</a></li>
                                                    <li><a href="#">اپل</a></li>
                                                    <li><a href="#">نوکیا</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">جستجو در نتایج:</div>
                            <div class="box-content">
                                <div class="ui-input ui-input--quick-search">
                                    <input type="text" class="ui-input-field ui-input-field--cleanable"
                                        placeholder="نام محصول یا برند مورد نظر را بنویسید…">
                                    <span class="ui-input-cleaner"></span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="box-toggle" data-toggle="collapse" href="#collapseExample1" role="button"
                                    aria-expanded="true" aria-controls="collapseExample1">
    دسته بندی نتایج
<i class="now-ui-icons arrows-1_minimal-down"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="collapse show" id="collapseExample1">
                                    <div class="ui-input ui-input--quick-search">
                                        <input type="text" class="ui-input-field ui-input-field--cleanable"
                                            placeholder="نام دسته بندی مورد نظر را بنویسید…">
                                        <span class="ui-input-cleaner"></span>
                                    </div>
                                    <div class="filter-option">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">
ریمکس
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox2" type="checkbox">
                                            <label for="checkbox2">
باسئوس
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox3" type="checkbox">
                                            <label for="checkbox3">
اپل
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox4" type="checkbox">
                                            <label for="checkbox4">
نیلکین
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox5" type="checkbox">
                                            <label for="checkbox5">
راک
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox6" type="checkbox">
                                            <label for="checkbox6">
توتو
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox7" type="checkbox">
                                            <label for="checkbox7">
فراری
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <div class="box-toggle" data-toggle="collapse" href="#collapseExample2" role="button"
                                    aria-expanded="true" aria-controls="collapseExample2">
    برند
                                    <i class="now-ui-icons arrows-1_minimal-down"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="collapse show" id="collapseExample2">
                                    <div class="ui-input ui-input--quick-search">
                                        <input type="text" class="ui-input-field ui-input-field--cleanable"
                                            placeholder="نام برند مورد نظر را بنویسید…">
                                        <span class="ui-input-cleaner"></span>
                                    </div>
                                    <div class="filter-option">
                                        <div class="checkbox">
                                            <input id="checkbox8" type="checkbox">
                                            <label for="checkbox8">
ریمکس
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox9" type="checkbox">
                                            <label for="checkbox9">
باسئوس
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox10" type="checkbox">
                                            <label for="checkbox10">
اپل
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox11" type="checkbox">
                                            <label for="checkbox11">
نیلکین
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox12" type="checkbox">
                                            <label for="checkbox12">
راک
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox13" type="checkbox">
                                            <label for="checkbox13">
توتو
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="checkbox14" type="checkbox">
                                            <label for="checkbox14">
فراری
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-content">
                                <input type="checkbox" name="checkbox" class="bootstrap-switch" checked />
                                <label for="">فقط کالاهای موجود</label>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-content">
                                <input type="checkbox" name="checkbox" class="bootstrap-switch" checked />
                                <label for="">فقط کالاهای آماده ارسال</label>
                            </div>
                        </div>
                    </aside>

                    <div class="col-12 col-sm-12 col-md-8 col-lg-9 order-2">
                        <div class="breadcrumb-section default">
                            <ul class="breadcrumb-list">
                                <li>
                                    <a href="#">
                                        <span>فروشگاه اینترنتی تاپ کالا</span>
                                    </a>
                                </li>
                                <li><span>جستجوی موبایل</span></li>
                            </ul>
                        </div>
                        <div class="listing default">
                            <div class="listing-counter">۶,۱۸۸ کالا</div>
                            <div class="listing-header default">
                                <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                                    data-label="مرتب‌سازی بر اساس :">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#related" role="tab"
                                            aria-expanded="false">{{$category->title}}</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="tab-content default text-center">
                                <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                                    <div class="container no-padding-right">
                                        <ul class="row listing-items">
                                            @foreach($category->products as $product)
                                            <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                <div class="product-box">
                                                    <div class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller">
                                                            <span class="product-seller-details-label">فروشنده:
                                                            </span>تاپ کالا
</span>
                                                        <span class="product-seller-details-badge-container"></span>
                                                    </div>
                                                    <a class="product-box-img" href="{{route('product-single', [$product->slug])}}">
                                                        <img src="{{$product->image}}" alt="">
                                                    </a>
                                                    <div class="product-box-content">
                                                        <div class="product-box-content-row">
                                                            <div class="product-box-title">
                                                                <a href="{{route('product-single', [$product->slug])}}">
                                                                    {{$product->title}}
</a>
                                                            </div>
                                                        </div>
                                                        <div class="product-box-row product-box-row-price">
                                                            <div class="price">
                                                                <div class="price-value">
                                                                    <div class="price-value-wrapper">
                                                                        {{number_format($product->price)}} <span
                                                                            class="price-currency">تومان</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </div>
{{--                         <ul class="pager-items">--}}
{{--                                    <li>--}}

{{--                                        <a class="pager-item is-active" href="#">۱</a>--}}
{{--                                    </li>--}}

{{--                                    <line class="pager-items--partition"></line>--}}
{{--                                    <li>--}}
{{--                                        <a class="pager-next"></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
