@component('Admin.layouts.content',['title' => 'لیست پلن های اشتراک'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست پلن های اشتراک </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a class="btn btn-sm btn-dark" href="{{route('admin.plans.create')}}">ایجاد پلن</a></li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست پلن های اشتراک</h4>
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
                        <p><span class="text-bold-600">لیست  پلن های اشتراک:</span> جدول لیست  پلن های اشتراک</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>نام پلن</th>
                                    <th>مدت زمان </th>
                                    <th> قیمت پلن به ریال</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plans as $plan)
                                    <tr>
                                             <td>
                                              {{$plan->title}}
                                            </td>
                                            <td>
                                               {{$plan->time_month}}ماه
                                            </td>
                                            <td>
                                                {{number_format($plan->price)}}
                                            </td>
                                        <td>
                                            <a href="{{route('admin.plans.edit' , $plan->id)}}" class="btn btn-sm btn-info">ویرایش</a>
                                        </td>
                                        <td>
                                            <form action="{{route('admin.plans.destroy' , $plan->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger" type="submit">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$plans->links('vendor.pagination.bootstrap-5')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent






