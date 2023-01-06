@component('Admin.layouts.content',['title' => 'ایجاد دسته بندی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ایجاد دسته بندی </li>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">فرم ایجاد دسته بندی</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.categories.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">عنوان دسته:</label>
                            <input name="title" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">توضیحات:</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>انتخاب دسته ی پدر</label>
                            <select class="form-control" name="parent">
                                <option selected disabled>دسته ی مورد نظر را انتخاب کنید</option>
                                @foreach($AllCategories as $key => $value)
                                    <option value="{{ $key }}">{{ $value}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="modal-footer">
                            <a  class="btn btn-danger" data-dismiss="modal">لغو</a>
                            <button type="submit" class="btn btn-primary">ایجاد دسته</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


















    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card" style="height: 800px;">
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
                            @include('Admin.layouts.errors')
                            <div class="card-text">
                                <p></p>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 offset-md-1 mt-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <!-- Button trigger modal -->
                                                        <a  class="btn btn-warning"    data-toggle="modal" data-target="#exampleModal">
                                                            افزودن دسته بندی جدید
                                                        </a>
                                                    </div>

                                                    <div class="col-md-7">
                                                        <h5 class="text-center p-1 mb-4 bg-info text-white">لیست دسته بندی ها</h5>
                                                        <ul id="tree1">
                                                            <div>
                                                                <div class="d-flex align-items-center mb-1" style=" align-items: center">
                                                            @include('Admin.categories.managechilds',['categories' => $categories])
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endcomponent
