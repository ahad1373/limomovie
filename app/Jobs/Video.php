<?php

namespace App\Jobs;

use App\Models\ActorVideo;
use App\Models\ListLinkPaginationVideo;
use App\Models\PaginationVideo;
use App\Models\User;
use App\Models\VideoGenre;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Video implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // PaginationVideo
        DB::table('pagination_videos')->delete();
        $url = 'https://newalmasmovie3.xyz/film/';
        $response = Http::get($url);
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($response->body());
        libxml_use_internal_errors(false);
        $finder = new DOMXPath($doc);
        $nodes = $finder->query("//*[@class='pages']");
        $lastPage = trim($nodes->item($nodes->count()-1)->nodeValue);
        $lastPage = substr($lastPage , 16);
        while ($lastPage >= 1)
        {
            \App\Models\PaginationVideo::create([
                'last-page' => $lastPage,
                'link'=> $url.'/'.'page'.'/'.$lastPage
            ]);
            $lastPage - 1 . "<br>";
            $lastPage--;
        }
        // EndPaginationVideo


    }
}
