<?php

namespace App\Http\Controllers;



use App\Jobs\DetailVideo;
use App\Jobs\LinkSerial;
use App\Jobs\Video;
use App\Models\ActorVideo;
use App\Models\AddLinkSerial;
use App\Models\Category;
use App\Models\LinkVideoDownload;
use App\Models\ListLinkPaginationSerial;
use App\Models\ListLinkPaginationVideo;
use App\Models\Serial;
use App\Models\SerialActor;
use App\Models\SerialGenre;
use App\Models\SerialLink;
use App\Models\SerialLinkTitle;
use App\Models\SerialSubtitle;
use App\Models\VideoGenre;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
//        $serials_genres = Serial
        return view('home.index');
    }


    public function film_pagination()
    {
        $list_films = \App\Models\Video::query();
        $list_films = $list_films->paginate(18);
       return view('home.film.all' , compact('list_films' ));
    }

    public function single_film(\App\Models\Video $video , Request $request)
    {
        $videos = \App\Models\Video::all();
        $genre = VideoGenre::all();
        $link_download = LinkVideoDownload::all();
        $actors= ActorVideo::all();
        $video = $videos->where('original_title' , '=' ,$request->original_title)->first();
        $comments = $video->comments()->get();
        $comments = $comments->where('approve' , 1)->all();
       return view('home.film.single' , compact('video' , 'genre'  , 'link_download' , 'actors' , 'comments'));
    }


    public function serial_pagination()
    {

        $list_serials= Serial::query();
        $list_serials = $list_serials->paginate(18);
        return view('home.serial.all' , compact('list_serials' ));
    }


    public function single_serial(Serial $serial , Request $request)
    {
        $serials = Serial::all();
        $genre = SerialGenre::all();
        $actor= SerialActor::all();
        $link = AddLinkSerial::query();
        $serial = $serials->where('original_title' , '=' ,$request->original_title)->first();
        $links = $link->where('serial_id' , '=' , $serial->serial_id)->get();
        $comments = $serial->comments()->get();
        $comments = $comments->where('approve' , 1)->all();
        return view('home.serial.single' , compact('serial' , 'genre'   , 'actor' , 'links' , 'comments'));
    }


    public function comment(Request $request)
    {

        $data = $request->validate([
            'commentable_id' => 'required',
            'commentable_type' => 'required',
            'comment' => 'required',
            'title' => 'required',
            'parent' => 'required',
            'rank' => 'required'
        ]);

        auth()->user()->comments()->create($data);
//        alert()->success('نظر شما با موفقیت ثبت شد.', 'موفق امیز')->persistent('متشکرم');
        return back();
    }


    public function singleCategory()
    {
        dd('ok');
        $category = Category::query();
        $category = $category->where('slug' , $request->slug)->get()->all();

        foreach ($category as $cat)
        {
            $category = $cat;
        }
        return view('home.categories.category-page', compact('category'));
    }



    public function categories_serial(Request $request)
    {

      $genres = SerialGenre::query();
      $genres = $genres->where('title',$request->category)->get();
      foreach ($genres as $genre)
      {
          $serial_id[]= $genre->serial_id;
      }
      foreach ($serial_id as $id)
      {
          $query = Serial::query();
          $serials[] = $query->where('serial_id' , '=' , $id)->get();
      }
      foreach ($serials as $serial)
      {
          foreach ($serial as $ser)
          {
              $list_serials[] = $ser;
          }
      }

      return view('home.categories.serials.index' , compact('list_serials'));
    }


    public function categories_video(Request $request)
    {

        $genres = VideoGenre::query();
        $genres = $genres->where('genre_title',$request->category)->get();
        foreach ($genres as $genre)
        {
            $video_id[]= $genre->video_id;
        }
        foreach ($video_id as $id)
        {
            $query = \App\Models\Video::query();
            $videos[] = $query->where('video_id' , '=' , $id)->get();
        }

        foreach ($videos as $video)
        {
            foreach ($video as $ved)
            {
                $list_films[] = $ved;
            }
        }

        return view('home.categories.films.index' , compact('list_films'));
    }




    public function search()
    {

        $videos = \App\Models\Video::query();

        if ($key = \request('search')) {
            $videos->where('original_title', 'like', "%$key%")->orWhere('persian_title' , 'like' , "%$key%");
        }
        $list_films = $videos->paginate(3);

        $serials = Serial::query();

        if ($key = \request('search')) {
            $serials->where('original_title', 'like', "%$key%")->orWhere('persian_title' , 'like' , "%$key%");
        }
        $list_serials= $serials->paginate(3);

        return view('home.search.result-search', compact('list_films' , 'list_serials' , 'key'));
    }



}
