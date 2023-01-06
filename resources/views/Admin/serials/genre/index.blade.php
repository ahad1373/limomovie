@component('Admin.layouts.content',['title' => 'ایجاد ژانر سریال'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ایجاد ژانر برای سریال </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.serials.show' , $serial->id)}}" class="btn btn-sm btn-warning">جزئیات کامل سریال </a></li>
    @endslot


    @slot('script')

        <script>

            let createNewPic = ({ id }) => {
                return `
                    <div class="row image-field" id="genre-${id}">
                    <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ژانر</label>
                                 <input type="text" name="genres[${id}][title]"  class="form-control">
                            </div>
                        </div>
                                                       <input type="hidden" name="genres[${id}][serial_id]" value="{{$serial_id}}"  class="form-control">

                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('genre-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
            }

            $('#add_product_image').click(function() {
                let imagesSection = $('#images_section');
                let id = imagesSection.children().length;

                imagesSection.append(
                    createNewPic({
                        id
                    })
                );

            });
            $('#add_product_image').click();


            // input
            let image;
            $('body').on('click','.button-image' , (event) => {
                event.preventDefault();

                image = $(event.target).closest('.image-field');

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });

            // set file link
            function fmSetLink($url) {
                image.find('.image_label').first().val($url);
            }

        </script>
    @endslot


    <div class="row">
        <div class="col-lg-12">
            @include('Admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ثبت ژانر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.serial-genre-store' , $serial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_serial" value="{{$id_serial}}">
                    <div class="card-body">

                        <div id="images_section">

                        </div>
                        <button class="btn btn-sm btn-danger" type="button" id="add_product_image">ژانر جدید</button>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.serials.show' , $serial->id) }}" class="btn btn-default float-left">لغو</a>

                        <button type="submit" class="btn btn-info">ثبت ژانر</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


@endcomponent
