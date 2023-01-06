<?php

namespace App\Http\Controllers\Admin\film\Details;

use App\Http\Controllers\Controller;
use App\Models\ActorVideo;
use App\Models\Video;
use App\Models\VideoGenre;
use Illuminate\Http\Request;

class AddDetailsFilmController extends Controller
{


    public function genre_index(Request $request)
    {

        $videos = Video::query();
        $video = $videos->where('video_id' , $request->video_id)->first();
        $video_id = $request->video_id;
        $id_video = $video->id;
        return view('Admin.films.genre.index' , compact('video' , 'video_id' , 'id_video'));
    }


    public function genre_store(Request $request)
    {

        $data = $request->validate([
            'genres.*.genre_title' => 'required',
            'genres.*.video_id' => 'required'
        ]);
        collect($data['genres'])->each(function ($genre){
            VideoGenre::create($genre);
        });
        $id = $request->id_video;
        return redirect(route('admin.films.show',$id));



    }


    public function actor_index(Request $request)
    {
        $videos = Video::query();
        $video = $videos->where('video_id' , $request->video_id)->first();
        $video_id = $request->video_id;
        $id_video = $video->id;
        return view('Admin.films.actor.index' , compact('video' , 'video_id' , 'id_video'));
    }


    public function actor_store(Request $request)
    {

        $data = $request->validate([
            'actors.*.actor_title' => 'required',
            'actors.*.video_id' => 'required'
        ]);
        collect($data['actors'])->each(function ($actor){

            ActorVideo::create($actor);
        });
        $id = $request->id_video;
        return redirect(route('admin.films.show',$id));
    }


}
