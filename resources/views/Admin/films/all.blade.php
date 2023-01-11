@component('Admin.layouts.content',['title' => 'لیست فیلم ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست فیلم ها </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a class="btn btn-sm btn-dark" href="{{route('admin.films.create')}}">ایجاد فیلم</a></li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست فیلم ها</h4>
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
                        <p><span class="text-bold-600">لیست فیلم ها:</span> جدول لیست فیلم ها</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام فیلم</th>
                                    <th>زمان فیلم</th>
                                    <th> imdb</th>
                                    <th>برو به جزئیات</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                    <th>فیلم مرتبط</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($films as $film)
                                    <tr>
                                             <td>
                                                 <a href="{{route('single_film' , $film->original_title)}}" target="_blank"> {{$film->persian_title}}</a>
                                            </td>
                                            <td>
                                               {{$film->time}}
                                            </td>
                                            <td>
                                                {{$film->imdb}}
                                            </td>
                                        <td>
                                            <a href="{{route('admin.films.show'  , $film->id)}}" class="btn btn-sm btn-success">جزئیات</a>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.films.edit' , $film->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.films.destroy' , $film->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.films.similar.create',$film->id)}}" class="btn btn-sm btn-primary">افزودن</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$films->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endcomponent






