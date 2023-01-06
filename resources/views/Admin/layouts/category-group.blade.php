<ul class="list-group">
    @foreach($categories as $category)

    <li class="list-group-item">
        <div class="">
            <span>{{$category->name}}</span>
        </div>
        <form action="{{route('admin.categories.destroy', $category->id)}}" id="category-{{$category->id}}-delete" method="post">
            @csrf
            @method('delete')
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('category-{{$category->id}}-delete').submit()" class="btn btn-sm btn-danger">حذف</a>
        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-sm btn-info">ویرایش</a>
        <a href="{{route('admin.categories.create')}}?parent={{$category->id}}" class="btn btn-sm btn-success">ثبت زیر دسته</a>
        @if($category->child->count())
        @include('Admin.layouts.category-group' , ['categories' => $category->child])
        @endif
    </li>
    @endforeach
</ul>
