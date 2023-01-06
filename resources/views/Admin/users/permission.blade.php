@component('Admin.layouts.content',['title' => '  دسترسی کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active"> دسترسی کاربر </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}" class="btn btn-sm btn-warning">لیست کاربران</a></li>
    @endslot

    <section id="basic-form-layouts"  class="basic-select2" data-select2-id="324">
        <div class="row match-height" data-select2-id="323">
            <div class="col-md-12">
                <div class="card" style="height: 800px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم دسترسی کاربر</h4>
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

                            <form class="form" action="{{route('admin.user.permission.insert' , $user->id)}}" method="post">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> اطلاعات دسترسی کاربر</h4>




                                    <div class="form-group">
                                        <p class="text-bold-600 font-medium-2">
                                            افزودن گروه دسترسی
                                        </p>
                                        <select name="roles[]" class="select2 form-control block select2-hidden-accessible" multiple="" id="responsive_multi" style="width: 100%" >

                                            <optgroup label="لیست گروه های دسترسی موجود">
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : ''}}>{{$role->title}}-{{$role->description}}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>





                                    <div class="form-group">
                                        <p class="text-bold-600 font-medium-2">
                                            افزودن دسترسی
                                        </p>
                                        <select name="permissions[]" class="select2 form-control block select2-hidden-accessible" multiple="" id="responsive_multii" style="width: 100%" >

                                            <optgroup label="لیست دسترسی های موجود">
                                                @foreach($permissions as $permission)
                                                    <option value="{{$permission->id}}" {{in_array($permission->id , $user->permissions->pluck('id')->toArray()) ? 'selected' : ''}}>{{$permission->title}}-{{$permission->description}}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                    </div>


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






