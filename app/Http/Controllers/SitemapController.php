<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Serial;
use App\Models\Video;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }


    public function videos()
    {
        $videos = Video::latest()->get();
        return response()->view('sitemap.videos', [ 'videos' => $videos ])->header('Content-Type', 'text/xml');
    }
    public function categories()
    {
        $categories = Category::all();
        return response()->view('sitemap.categories', [ 'categories' => $categories ])->header('Content-Type', 'text/xml');
    }
    public function serials()
    {
        $serials = Serial::all();
        return response()->view('sitemap.serials', ['serials' => $serials])->header('Content-Type', 'text/xml');
    }
}
