@component('Admin.layouts.content',['title' => 'لیست کاربران'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست کاربران </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.users.create')}}" class="btn btn-sm btn-outline-warning">ایجاد کاربر</a></li>
            <li class="breadcrumb-item"><a href="{{request()->fullUrlWithQuery(['admin' => 1])}}" class="btn btn-sm btn-outline-info">کاربران مدیر</a></li>
    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست کاربران</h4>
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
                        <p><span class="text-bold-600">لیست کاربران:</span> جدول لیست کاربران</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت ایمیل</th>
                                    <th>اقدام به ویرایش</th>
                                    <th>اقدام به حذف</th>
                                        <th>دسترسی</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->email_verified_at)
                                                <span class="btn btn-sm btn-success">فعال</span>
                                            @else
                                                <span class="btn btn-sm btn-danger">غیرفعال</span>
                                            @endif
                                        </td>

                                            <td>
                                                <a href="{{route('admin.users.edit',$user->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                            </td>

                                            <td>
                                                <form action="{{route('admin.users.destroy',$user->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger">حذف</button>
                                                </form>
                                            </td>

                                            <td>
                                                <a href="{{route('admin.user.permission' , $user->id)}}" class="btn btn-sm btn-warning">دسترسی</a>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$users->links('vendor.pagination.bootstrap-4')}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent






