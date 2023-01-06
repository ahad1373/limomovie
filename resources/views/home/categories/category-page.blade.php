@extends('home.master')
@section('content')

    <!-- main -->
    <main class="search-page default">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 order-2">
                    <div class="breadcrumb-section default">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="#">
                                    <span>فروشگاه اینترنتی تاپ کالا</span>
                                </a>
                            </li>
                            <li><span>{{$category->slug}}</span></li>
                        </ul>
                    </div>
                    <div class="listing default">
                        <div class="listing-header default">
                            <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                                data-label="عنوان دسته بندی :">
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
                                        <li class="col-xl-12 col-lg-12 col-md-6 col-12 no-padding">
                                            <div class="product-box">
                                                <div class="product-box-content">
                                                    <div class="product-box-content-row">
                                                        <div class="product-box-title">
                                                            <a href="#">
                                                                {!! $category->description !!}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

@endsection
