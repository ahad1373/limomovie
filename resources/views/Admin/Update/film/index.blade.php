@component('Admin.layouts.content',['title' => 'لیست بروزرسانی فیلم'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست بروزرسانی فیلم </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>

    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست بروزرسانی فیلم</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <p class="card-text">
                        <fieldset class="form-group position-relative mb-0">
                            <form action="" method="get">
                                <input type="text" name="table" class="form-control form-control-xl input-xl" id="iconLeft1" placeholder="جستجو در اینجا ...">
                                <div class="form-control-position">
                                    <i  class="ft-search font-medium-4"></i>
                                </div>
                            </form>

                        </fieldset>
                        </p>
                        <p><span class="text-danger text-bold-600">توضیح بروزرسانی فیلم ها:</span>لطفا توجه داشته باشید برای بروزرسانی درست فیلم های  سایت باید طبق شماره ی بروزرسانی به ترتیب، بروزرسانی ها انجام گردد.</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>شماره بروزرسانی</th>
                                    <th>نام بروز رسانی</th>
                                    <th>توضیحات</th>
                                    <th>اقدام</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                           1
                                        </td>
                                        <td>
                                            کرال پیجینیشن فیلم
                                        </td>
                                        <td>
                                            این کرال تمامی تعداد صفحات پیجینیشن فیلم را بروزرسانی می کند
                                        </td>
                                        <td>
                                            <a href="{{route('admin.pagination_video')}}" class="btn btn-sm btn-info">بروزرسانی</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            کرال لیست لینک فیلم
                                        </td>
                                        <td>
                                            این کرال تمامی لینک های فیلم را بروزرسانی می کند
                                        </td>
                                        <td>
                                            <a href="{{route('admin.link_video')}}" class="btn btn-sm btn-info">بروزرسانی</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            کرال جزئیات فیلم
                                        </td>
                                        <td>
                                            این کرال تمامی جزئیات فیلم را بروزرسانی می کند
                                        </td>
                                        <td>
                                            <a href="{{route('admin.detail_video')}}" class="btn btn-sm btn-info">بروزرسانی</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            کرال لینک دانلود فیلم
                                        </td>
                                        <td>
                                            این کرال تمامی لینک های دانلود هر فیلم را بروزرسانی می کند
                                        </td>
                                        <td>
                                            <a href="{{route('admin.download_video')}}" class="btn btn-sm btn-info">بروزرسانی</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
{{--                            {{$users->links('vendor.pagination.bootstrap-4')}}--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent






