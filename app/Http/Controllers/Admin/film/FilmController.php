<?php

namespace App\Http\Controllers\Admin\film;

use App\Http\Controllers\Controller;
use App\Models\ActorVideo;
use App\Models\ListLinkPaginationVideo;
use App\Models\Video;
use App\Models\VideoGenre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Video::query();
        if ($key =\request('table'))
        {
            $film->where('persian_title','like',"%$key%")->orWhere('director','like',"%%$key")->orWhere('video_id' , $key);
        }
        $films = $film->paginate(10);

        return  view('Admin.films.all' ,  compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.films.create');
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
            'video_id' =>  ['required' , 'unique:videos'] ,
            'original_title' => ['required' , 'unique:videos'] ,
            'imdb' => ['required'],
            'age_category' => ['required'],
            'country' => ['required'],
            'time' => ['required'],
            'language' => ['required'],
            'synopsis' => ['required'],
            'director'=> ['required'] ,
            'writer' => ['required'],
            'image' => ['required'],
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
        $data['category_id'] = 1;
        Video::create($data);
//        $video = auth()->user()->videos()->create($data);
        return redirect(route('admin.films.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $videos = Video::query();
        $video = $videos->where('id' , '=' , $id)->first();
        $genres = VideoGenre::query();
        $genres = $genres->where('video_id' , '=' , $video->video_id)->get();
        $actors = ActorVideo::query();
        $actors = $actors->where('video_id' ,$video->video_id)->get();
        return view('Admin.films.single-film'  , compact('video' , 'genres'  , 'actors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $videos =Video::all();
        $video = $videos->where('id' , '=' , $id)->first();
        return  view('Admin.films.edit' , compact('video'));
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
        $videos = Video::query();
        $video = $videos->where('id' , '=' , $id)->first();
        $data = $request->validate([
            'persian_title' => ['required' ,  Rule::unique('videos')->ignore($video->id)] ,
            'video_id' =>  ['required' ,  Rule::unique('videos')->ignore($video->id)] ,
            'original_title' => ['required' , Rule::unique('videos')->ignore($video->id)] ,
            'imdb' => ['required'],
            'age_category' => ['required'],
            'country' => ['required'],
            'time' => ['required'],
            'language' => ['required'],
            'synopsis' => ['required'],
            'director'=> ['required'] ,
            'writer' => ['required'] ,
            'image' => ['required']
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


        $video->update($data);

        return redirect(route('admin.films.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $video = Video::all();
        $video = $video->where('id' ,'=' , $id)->first();
        $video->delete();
        return back();
    }
}
