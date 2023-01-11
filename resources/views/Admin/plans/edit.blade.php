@component('Admin.layouts.content',['title' => 'ویرایش پلن ااشتراک'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ویرایش پلن اشتراک </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.plans.index')}}" class="btn btn-sm btn-warning">ویرایش پلن ها</a></li>
    @endslot



    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 1750px;">
                    <div class="card-header">
                        @include('Admin.layouts.errors')
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ویرایش اطلاعات پلن</h4>
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

                            <form class="form" action="{{route('admin.plans.update' , $plan->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> اطلاعات پلن</h4>

                                    <div class="form-group">
                                        <label for="contactinput5">نام پلن</label>
                                        <input class="form-control border-primary" name="title" type="text" placeholder="نام پلن" id="contactinput5" value="{{old('title' , $plan->title)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">مدت زمان پلن (به ماه) :</label>
                                        <select name="time_month" class="form-control border-primary" aria-label="Default select example">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">قیمت پلن (به ریال)</label>
                                        <input class="form-control border-primary" name="price" type="text" placeholder="قیمت پلن" id="contactinput5" value="{{old('price' , $plan->price)}}">
                                    </div>


                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="status" id="switcheryColor4" class="switchery" data-color="success" data-secondary-color="success" checked="" data-switchery="true" style="display: none;">
                                        <label for="switcheryColor4" class="card-title ml-1">فعال بودن پلن </label>
                                    </div>

                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.plans.index')}}" type="button" class="btn btn-danger mr-1">
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
