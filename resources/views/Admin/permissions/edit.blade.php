@component('Admin.layouts.content',['title' => 'ویرایش دسترسی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ویرایش دسترسی </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}" class="btn btn-sm btn-warning">لیست دسترسی</a></li>
    @endslot

    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 800px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ویرایش اطلاعات دسترسی</h4>
                        <a class="heading-elements-toggle">
                            <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="collapse">
                                        <i class="ft-minus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-action="reload">
                                        <i class="ft-rotate-cw"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-action="expand">
                                        <i class="ft-maximize"></i>
                                    </a>
                                </li>
                                <li>
                                    <a data-action="close">
                                        <i class="ft-x"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <div class="card-text">
                                <p></p>
                            </div>

                            <form class="form" action="{{route('admin.permissions.update', $permission->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> اطلاعات دسترسی</h4>

                                    <div class="form-group">
                                        <label for="contactinput5">نام</label>
                                        <input class="form-control border-primary" name="title" type="text" placeholder="نام" id="contactinput5" value="{{old('title' , $permission->title)}}">
                                    </div>



                                    <div class="form-group">
                                        <label for="contactinput5">توضیحات</label>
                                        <input class="form-control border-primary" name="description" type="text" placeholder="توضیحات" id="contactinput5" value="{{old('description' ,$permission->description)}}">
                                    </div>


                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.permissions.index')}}" type="button" class="btn btn-danger mr-1">
                                        <i class="ft-x"></i> لغو
                                    </a>
                                    <button type="submit" class="btn btn-primary ">
                                        <i class="la la-check-square-o"></i> ذخیره
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endcomponent






