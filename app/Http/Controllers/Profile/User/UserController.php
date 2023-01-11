<?php

namespace App\Http\Controllers\Profile\User;

use App\Http\Controllers\Controller;
use App\Models\Interest;
use App\Models\ListLinkPaginationVideo;
use App\Models\Plan;
use App\Models\Serial;
use App\Models\SerialGenre;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoGenre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interest = Interest::all();
        $user = User::where('id' , auth()->user()->id)->first();
        $interests = $interest->where('user_id' , $user->id)->all();
        $images = ListLinkPaginationVideo::all();
        $videos = Video::all();
        $genres = VideoGenre::all();
        $serials = Serial::all();
        $s_genres = SerialGenre::all();
        $plans = Plan::all();
        return view('home.profile.index' , compact('plans' ,'user'  , 'images'  ,'interests' , 'videos' , 'genres' , 'serials' , 's_genres'));
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::where('id' , auth()->user()->id)->first();
        return view('home/profile.user.index' , compact('user'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $user = User::where('id' , auth()->user()->id)->first();

        if ($request->name)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
            $data['name'] = $request->name;
        }
        if ($request->email)
        {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            ]);
            $data['email']= $request->email;
        }
        if ($request->password){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $data['password'] = $request->password;
        }


        $user->update($data);

        return redirect(route('profile.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
