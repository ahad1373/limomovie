@foreach($categories as $category)
<li class="list-item list-item-has-children mega-menu mega-menu-col-5">
    <a class="nav-link" href="{{route('category-single', [$category->slug])}}">
        {{$category->title}}
    </a>
    <ul class="sub-menu nav">
        @foreach($category->child as $cate)
        <li class="list-item list-item-has-children">
            <i class="now-ui-icons arrows-1_minimal-left"></i>
            <a class="main-list-item nav-link" href="{{route('category-single', [$cate->slug ])}}">
                {{$cate->title}}
            </a>
            <ul class="sub-menu nav">
                @if($cate->child)
                    @foreach($cate->child as $child)
                      <li class="list-item">
                    <a class="nav-link" href="{{route('category-single', [$child->slug])}}">
                        {{$child->title}}
                        @include('home.categories.category-menu',['categories' => $child->child])
                    </a>
                </li>
                    @endforeach
                @endif
            </ul>
        </li>
        @endforeach
        <img src="/assets/img/1636.png" alt="">
    </ul>
</li>
@endforeach







