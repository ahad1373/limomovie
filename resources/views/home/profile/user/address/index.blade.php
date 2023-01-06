@extends('home.master')

@section('content')

    <div class="content-section default">
        <div class="table-responsive">
            <table class="table table-order">
                <thead class="thead-light">
                <tr>
                    <th scope="col">نام کاربر</th>
                    <th scope="col">عنوان آدرس</th>
                    <th scope="col">استان</th>
                    <th scope="col"> شهر</th>
                    <th scope="col"> آدرس</th>
                    <th scope="col"> کد پستی</th>
                    <th scope="col">ویرایش</th>
                    <th scope="col">حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($addresses as $address)
                <tr>

                    <td>{{$user->name}}</td>
                    <td class="order-code">{{$address->title}}</td>
                    @php
                    $city = $city->where('id' , $address->city_id)->first();
                    @endphp
                    @php
                        $state = $state->where('id' , $city->state_id)->first();
                    @endphp
                    <td>{{$state->title}}</td>
                    <td>{{$city->title}}</td>
                    <td> {{$address->address}}</td>
                    <td>{{$address->postal_code}}</td>
                    <td><a href="{{route('profile.address.edit' , $address->id)}}" class="btn btn-info btn-sm">ویرایش</a></td>
                    <td>
                        <form action="{{route('profile.address.destroy' , $address->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger btn-sm">حذف</button>
                        </form>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
