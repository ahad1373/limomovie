<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::query();
        $user = auth()->user();
        $addresses = $addresses->where('user_id' ,  auth()->user()->id)->get();
        $city = City::query();
        $state = State::query();
        return view('home.profile.user.address.index' , compact('addresses' , 'user' , 'city' , 'state') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $user = Auth::user();
        return view('home.profile.user.address.create' , compact('cities' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $request->validate([
            'title' => 'required',
            'phone' => ['required' , 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/' ,'unique:addresses,phone'],
            'postal_code' => ['required' , 'integer'],
            'address' => 'required',
            'city_id' => 'required',
            'user_id' => 'required'
            ]);
            Address::create($data);
            return redirect(route('profile.address.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {

        $user = auth()->user();
        $cities = City::all();
        return view('home.profile.user.address.edit' , compact('address' , 'user' , 'cities'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {

        $data = $request->validate([
            'title' => 'required',
            'phone' => ['required' , 'regex:/^09(1[0-9]|3[1-9]|2[1-9])-?[0-9]{3}-?[0-9]{4}$/' ,Rule::unique('addresses')->ignore($address->id)],
            'postal_code' => ['required' , 'integer'],
            'address' => 'required',
            'city_id' => 'required',
            'user_id' => 'required'
        ]);

        $address->update($data);
        return redirect(route('profile.address.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }
}
