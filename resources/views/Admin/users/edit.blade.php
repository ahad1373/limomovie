@component('Admin.layouts.content',['title' => 'ویرایش کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ویرایش کاربر </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" class="btn btn-sm btn-warning">لیست کاربران</a></li>
    @endslot

    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 800px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ورود اطلاعات کاربر</h4>
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

                            <form class="form" action="{{route('admin.users.update' ,$user->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> ویرایش اطلاعات کاربر</h4>
                                    <div class="form-group">
                                        <label for="contactinput5">نام</label>
                                        <input class="form-control border-primary" name="name" type="text" placeholder="نام" id="contactinput5" value="{{old('name', $user->name)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">پست الکترونیک</label>
                                        <input class="form-control border-primary" name="email" type="email" placeholder="پست الکترونیک" id="contactemail5" value="{{old('email', $user->email)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput6">رمز عبور</label>
                                        <input class="form-control border-primary" name="password" type="password" placeholder="*****" id="contactinput6">
                                    </div>

                                    <div class="form-group">
                                        <label>تکرار رمز عبور</label>
                                        <input class="form-control border-primary" name="password_confirmation" id="contactinput7" placeholder="*****" type="password" >
                                    </div>

                                    @if(! $user->email_verified_at)
                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="verify" id="switcheryColor4" class="switchery" data-color="success" data-secondary-color="success" checked="" data-switchery="true" style="display: none;">
                                        <label for="switcheryColor4" class="card-title ml-1">اکانت فعال باشد</label>
                                    </div>
                                    @endif



                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.users.index')}}" type="button" class="btn btn-danger mr-1">
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
