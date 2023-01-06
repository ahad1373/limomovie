@component('Admin.layouts.content',['title' => 'ویرایش دسته بندی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ویرایش دسته بندی </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}" class="btn btn-sm btn-warning">لیست دسته بندی</a></li>
    @endslot


    @slot('script')
        <script src="/js/ckeditor/ckeditor.js"></script>

        <script !src="">
            CKEDITOR.replace('description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});

            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-pic').addEventListener('click', (event) => {
                    event.preventDefault();

                    window.open('/file-manager/fm-button', 'fm', 'width=800,height=400');
                });
            });

            // set file link
            function fmSetLink($url) {
                document.getElementById('pic_label').value = $url;
            }

        </script>
    @endslot




    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 1200px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ورود اطلاعات دسته بندی</h4>
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

                            <form class="form" action="{{route('admin.categories.update' , $category->id)}}" method="post" >
                                @csrf
                                @method('patch')
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> ویرایش اطلاعات دسته بندی</h4>
                                    <div class="form-group">
                                        <label for="contactinput5">نام</label>
                                        <input class="form-control border-primary" name="title" type="text" placeholder="نام" id="contactinput5" value="{{old('title', $category->title)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="contactinput5">توضیحات دسته</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$category->description}}</textarea>
                                    </div>


                                    <div class="form-group">
                                                <label>Parent</label>
                                                <select class="form-control" name="parent">
                                                    <option selected disabled>دسته ی مورد نظر را انتخاب کنید</option>
                                                    @foreach($AllCategories as $key => $value)
                                                        <option value="{{ $key }}">{{ $value}}</option>
                                                    @endforeach
                                                </select>
                                    </div>

                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.categories.index')}}" type="button" class="btn btn-danger mr-1">
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
