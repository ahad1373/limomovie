<?php

namespace App\Http\Controllers\Admin\serial\Details;

use App\Http\Controllers\Controller;

use App\Models\Serial;
use App\Models\SerialActor;
use App\Models\SerialGenre;
use Illuminate\Http\Request;

class AddDetailsSerialController extends Controller
{
    public function genre_index(Request $request)
    {

        $serials = Serial::query();
        $serial = $serials->where('serial_id' , $request->serial_id)->first();
        $serial_id = $request->serial_id;
        $id_serial = $serial->id;
        return view('Admin.serials.genre.index' , compact('serial' , 'serial_id' , 'id_serial'));
    }


    public function genre_store(Request $request)
    {

        $data = $request->validate([
            'genres.*.title' => 'required',
            'genres.*.serial_id' => 'required'
        ]);
        collect($data['genres'])->each(function ($genre){
            SerialGenre::create($genre);
        });
        $id = $request->id_serial;
        return redirect(route('admin.serials.show',$id));

    }


    public function actor_index(Request $request)
    {
        $serials = Serial::query();
        $serial = $serials->where('serial_id' , $request->serial_id)->first();
        $serial_id = $request->serial_id;
        $id_serial = $serial->id;
        return view('Admin.serials.actor.index' , compact('serial' , 'serial_id' , 'id_serial'));
    }


    public function actor_store(Request $request)
    {

        $data = $request->validate([
            'actors.*.title' => 'required',
            'actors.*.serial_id' => 'required'
        ]);
        collect($data['actors'])->each(function ($actor){

            SerialActor::create($actor);
        });
        $id = $request->id_serial;
        return redirect(route('admin.serials.show',$id));
    }
}
