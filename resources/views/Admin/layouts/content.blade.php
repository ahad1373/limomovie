@extends('Admin.master')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">{{$title}}</h3>
            <div class="breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                     {{$breadcrumb}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Horizontal Navs start -->
     {{$slot}}
    </div>

@endsection
@section('script')
    {{$script ?? ''}}

@endsection
