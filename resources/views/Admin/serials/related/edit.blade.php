@component('Admin.layouts.content',['title' => 'ایجاد گروه دسترسی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item active">ایجاد دسترسی </li>
        <li class="breadcrumb-item"><a href="{{route('admin.')}}">خانه</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}" class="btn btn-sm btn-warning">لیست محصولات</a></li>
    @endslot

    <section id="basic-form-layouts"  class="basic-select2" data-select2-id="324">
        <div class="row match-height" data-select2-id="323">
            <div class="col-md-12">
                <div class="card" style="height: 800px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-colored-form-control">فرم ورود اطلاعات گروه دسترسی</h4>
                        @include('Admin.layouts.errors')
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

                            <form class="form" action="{{route('admin.products.similar.update' , ['product' => $product->id , 'similar' => $similar->id])}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-body">

                                    <h4 class="form-section">
                                        <i class="ft-briefcase"></i> اطلاعات گروه دسترسی</h4>

                                    <input type="hidden" name="similarable_type" value="{{get_class($product)}}">
                                    <input type="hidden" name="similarable_id" value="{{$product->id}}">

                                    <div class="form-group">
                                        <p class="text-bold-600 font-medium-2">
                                            لیست محصولات مرتبط منتخب
                                        </p>
                                                @foreach($similars as $similar)
                                                    @php
                                                        $products = \App\Models\Product::query();
                                                        $products = $products->where('id' , $similar->similar_id)->get();
                                                    @endphp
                                                    @foreach($products as $product)
                                                        <div class="btn btn-sm btn-primary">{{$product->title}}</div>
                                                    @endforeach
                                                @endforeach
                                            </optgroup>
                                    </div>


                                    <div class="form-group">
                                        <p class="text-bold-600 font-medium-2">
                                            افزودن محصول  مرتبط
                                        </p>
                                        <select name="similar_id[]" class="select2 form-control block select2-hidden-accessible" multiple="" id="responsive_multi" style="width: 100%" data-select2-id="responsive_multi" tabindex="-1" aria-hidden="true">
                                            <optgroup label="لیست محصولات های موجود">
                                                @foreach($PRODUCTS as $product)
                                                    <option value="{{$product->id}}" >{{$product->title}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        </div>























                                </div>

                                <div class="form-actions right ">
                                    <a href="{{route('admin.products.index')}}" type="button" class="btn btn-danger mr-1">
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






