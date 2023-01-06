@component('Admin.layouts.content',['title' => 'لیست گروه های دسترسی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست گروه های دسترسی  </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-outline-warning">ایجاد گروه دسترسی</a></li>

    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست گروه های دسترسی</h4>
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
                        <p><span class="text-bold-600">لیست گروه های دسترسی:</span> جدول لیست گروه های دسترسی </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>آیدی گروه دسترسی</th>
                                    <th>نام گروه دسترسی</th>
                                    <th>توضیحات گروه دسترسی</th>
                                    <th>اقدام به ویرایش</th>
                                    <th>اقدام به حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->title}}</td>
                                    <td>{{$role->description}}</td>
                                    <td>
                                        <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.roles.destroy',$role->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$roles->links('vendor.pagination.bootstrap-4')}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent






