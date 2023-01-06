@component('Admin.layouts.content',['title' => 'لیست سریال ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست سریال ها </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a class="btn btn-sm btn-dark" href="{{route('admin.serials.create')}}">ایجاد سریال</a></li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست سریال ها</h4>
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
                        <p><span class="text-bold-600">لیست سریال ها:</span> جدول لیست سریال ها</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام سریال</th>
                                    <th>زمان فیلم</th>
                                    <th> imdb</th>
                                    <th>برو به جزئیات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($serials as $serial)
                                    <tr>

                                        <td>
                                            <a target="_blank" href="{{route('single_serial' , $serial->original_title)}}">  {{$serial->persian_title}}</a>

                                        </td>
                                        <td>
                                            {{$serial->time}}
                                        </td>
                                        <td>
                                            {{$serial->imdb}}
                                        </td>

                                        <td>
                                            <a href="{{route('admin.serials.show'  , $serial->id)}}" class="btn btn-sm btn-success">جزئیات</a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.serials.edit' , $serial->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.serials.destroy' , $serial->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$serials->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endcomponent






