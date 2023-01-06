@component('Admin.layouts.content',['title' => 'لیست نظرات تایید نشده'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">لیست نظرات تایید نشده </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
    @endslot


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست نظرات</h4>
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
                        <p><span class="text-bold-600">لیست نظرات:</span> جدول لیست نظرات</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>آیدی نظر</th>
                                    <th>نام کاربر نظر دهنده</th>
                                    <th>متن نظر</th>
                                    <th>تایید</th>
                                    <th>اقدام به حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <th scope="row">{{$comment->id}}</th>
                                        <td>{{$comment->user->name}}</td>
                                        <td>{{$comment->comment}}</td>
                                            <td>
                                                <form action="{{route('admin.comments.update',$comment->id)}}" method="post">
                                                    @csrf
                                                    @method('patch')
                                                    <button type="submit" class="btn btn-sm btn-success">تایید</button>
                                                 </form>
                                            </td>
                                            <td>
                                                <form action="{{route('admin.comments.destroy',$comment->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm btn-danger">حذف</button>
                                                </form>
                                            </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endcomponent






