<?php

namespace App\Providers;


use App\Models\Category;
use App\Models\Serial;
use App\Models\SerialGenre;
use App\Models\Video;
use App\Models\VideoGenre;
use App\service\testservice;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('categories' , Category::where('parent',0)->get());


        View::share('category_serial_title' , Category::where('id',2)->first());
        View::share('categories_serial' , Category::where('parent', '=' ,2)->get());

        View::share('category_film_title' , Category::where('id',1)->first());
        View::share('categories_video' , Category::where('parent', '=' ,1)->get());

        View::share('serials' , Serial::where('new',1)->get());
        View::share('genre_serial' , SerialGenre::all());


        View::share('videos' , Video::where('special',1)->get());
        View::share('genre_video' , VideoGenre::all());

    }
}
