@component('Admin.layouts.content',['title' => 'ایجاد سریال'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ایجاد فیلم </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.serials.index')}}" class="btn btn-sm btn-warning">لیست سریال ها</a></li>
    @endslot


    @slot('script')

        <script>
            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();

                    window.open('/file-manager/fm-button', 'fm', 'width=1000,height=600');
                });
            });

            // set file link
            function fmSetLink($url) {
                document.getElementById('image_label').value = $url;
            }
        </script>
    @endslot

    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 1700px;">
                    <div class="card-header">
                        @include('Admin.layouts.errors')
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ورود اطلاعات سریال</h4>
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

                            <form class="form" action="{{route('admin.serials.store')}}" method="post">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> اطلاعات سریال</h4>

                                    <div class="form-group">
                                        <label for="contactinput5">شماره سریال تصادفی (نهایتا چهار رقمی باشد)</label>
                                        <input class="form-control border-primary" name="serial_id" type="number" placeholder="شماره تصادفی سریال" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">نام فارسی سریال</label>
                                        <input class="form-control border-primary" name="persian_title" type="text" placeholder="نام فارسی سریال" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">نام اصلی(انگلیسی) سریال</label>
                                        <input class="form-control border-primary" name="original_title" type="text" placeholder="نام اوریجینال سریال" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">  پوستر سریال </label>
                                        <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="img">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="contactinput5">امتیاز imdb از 10</label>
                                        <input class="form-control border-primary" name="imdb" type="text" placeholder="امتیاز imdb" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">گروه سنی</label>
                                        <select name="age_category" class="form-control border-primary" aria-label="Default select example">
                                            <option value="G">G</option>
                                            <option value="PG">PG</option>
                                            <option value="PG-13">PG-13</option>
                                            <option value="R">R</option>
                                            <option value=" NC-17"> NC-17</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> کشور سازنده</label>
                                        <input class="form-control border-primary" name="country" type="text" placeholder="کشور سازنده" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> زمان سریال  مثال : 43 دقیقه</label>
                                        <input class="form-control border-primary" name="time" type="text" placeholder="زمان سریال" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> زبان فیلم </label>
                                        <input class="form-control border-primary" name="language" type="text" placeholder="زبان فیلم" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> خلاصه داستان </label>
                                        <textarea name="synopsis" id="description" class="form-control"  cols="30" rows="4" placeholder="خلاصه داستان"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> سازندگان فیلم </label>
                                        <input class="form-control border-primary" name="directors" type="text" placeholder="سازندگان فیلم" id="contactinput5">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5"> شبکه پخش </label>
                                        <input class="form-control border-primary" name="broadcast_network" type="text" placeholder="شبکه پخش" id="contactinput5">
                                    </div>


                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="status" id="switcheryColor4" class="switchery" data-color="success" data-secondary-color="success" checked="" data-switchery="true" style="display: none;">
                                        <label for="switcheryColor4" class="card-title ml-1">سریال فعال باشد</label>
                                    </div>

                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="new" id="switcheryColor4" class="switchery" data-color="success" data-secondary-color="success" checked="" data-switchery="true" style="display: none;">
                                        <label for="switcheryColor4" class="card-title ml-1">سریال جدید </label>
                                    </div>

                                    <div class="form-group mt-1">
                                        <input type="checkbox" name="special" id="switcheryColor4" class="switchery" data-color="success" data-secondary-color="success" checked="" data-switchery="true" style="display: none;">
                                        <label for="switcheryColor4" class="card-title ml-1">سریال ویژه </label>
                                    </div>

                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.films.index')}}" type="button" class="btn btn-danger mr-1">
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
