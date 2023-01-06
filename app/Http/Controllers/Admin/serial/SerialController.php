<?php

namespace App\Http\Controllers\Admin\serial;

use App\Http\Controllers\Controller;
use App\Models\ActorVideo;
use App\Models\ListLinkPaginationSerial;
use App\Models\Serial;
use App\Models\SerialActor;
use App\Models\SerialGenre;
use App\Models\Video;
use App\Models\VideoGenre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SerialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serials = Serial::query();
        if ($key =\request('table'))
        {
            $serials->where('persian_title','like',"%$key%")->orWhere('broadcast_network','like',"%%$key")->orWhere('serial_id' , $key);
        }
        $serials = $serials->paginate(10);
        return view('Admin.serials.all' , compact('serials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.serials.create');
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
            'persian_title' => ['required' , 'unique:videos'] ,
            'serial_id' =>  ['required' , 'unique:serials'] ,
            'original_title' => ['required' , 'unique:videos'] ,
            'imdb' => ['required'],
            'age_category' => ['required'],
            'country' => ['required'],
            'time' => ['required'],
            'language' => ['required'],
            'synopsis' => ['required'],
            'directors'=> ['required'] ,
            'img' => ['required'],
            'broadcast_network' => ['required']
        ]);
        if ($request->status == "on")
        {
            $data['status'] = 1;
        }else
        {
            $data['status'] = 0;
        }
        if ($request->new == "on")
        {
            $data['new'] = 1;
        }else
        {
            $data['new'] = 0;
        }

        if ($request->special == "on")
        {
            $data['special'] = 1;
        }else
        {
            $data['special'] = 0;
        }
        $data['category_id'] = 2;

        Serial::create($data);
//        $video = auth()->user()->videos()->create($data);
        return redirect(route('admin.serials.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $serials = Serial::query();
        $serial= $serials->where('id' , '=' , $id)->first();
        $genre = SerialGenre::query();
        $genres = $genre->where('serial_id' , '=' ,$serial->serial_id)->get();
        $actors = SerialActor::query();
        $actors = $actors->where('serial_id' ,$serial->serial_id)->get();
        return view('Admin.serials.single-serial', compact('serial'  ,'genres' , 'actors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serials = Serial::all();
        $serial = $serials->where('id' , '=' , $id)->first();
        return  view('Admin.serials.edit' , compact('serial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serials = Serial::query();
        $serial = $serials->where('id' , '=' , $id)->first();
        $data = $request->validate([
            'persian_title' => ['required' ,  Rule::unique('serials')->ignore($serial->id)] ,
            'serial_id' =>  ['required' ,  Rule::unique('serials')->ignore($serial->id)] ,
            'original_title' => ['required' , Rule::unique('serials')->ignore($serial->id)] ,
            'imdb' => ['required'],
            'age_category' => ['required'],
            'country' => ['required'],
            'time' => ['required'],
            'language' => ['required'],
            'synopsis' => ['required'],
            'directors'=> ['required'] ,
            'broadcast_network' => ['required'] ,
            'img' => ['required']
        ]);
        if ($request->status == "on")
        {
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }


        if ($request->new == "on")
        {
            $data['new'] = 1;
        }else{
            $data['new'] = 0;
        }



        if ($request->special == "on")
        {
            $data['special'] = 1;
        }else{
            $data['special'] = 0;
        }


        $serial->update($data);

        return redirect(route('admin.serials.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serial = Serial::all();
        $serial = $serial->where('id' ,'=' , $id)->first();
        $serial->delete();
        return back();
    }
}
