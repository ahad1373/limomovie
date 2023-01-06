@component('Admin.layouts.content',['title' => 'لیست دسترسی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست دسترسی ها </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>

        <li class="breadcrumb-item"><a href="{{route('admin.permissions.create')}}" class="btn btn-sm btn-outline-warning">ایجاد دسترسی</a></li>

    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست دسترسی ها</h4>
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
                        <p><span class="text-bold-600">لیست دسترسی ها:</span> جدول لیست دسترسی ها</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>آیدی دسترسی</th>
                                    <th>نام دسترسی</th>
                                    <th>توضیحات دسترسی</th>

                                    <th>اقدام به ویرایش</th>

                                    <th>اقدام به حذف</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <th scope="row">{{$permission->id}}</th>
                                    <td>{{$permission->title}}</td>
                                    <td>{{$permission->description}}</td>

                                    <td>
                                        <a href="{{route('admin.permissions.edit',$permission->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.permissions.destroy',$permission->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                {{$permissions->links('vendor.pagination.bootstrap-4')}}
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent






