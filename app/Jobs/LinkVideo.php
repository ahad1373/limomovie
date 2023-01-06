<?php

namespace App\Jobs;

use App\Models\ListLinkPaginationVideo;
use App\Models\PaginationVideo;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class LinkVideo implements ShouldQueue
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

        // LinkVideo
        ListLinkPaginationVideo::truncate();
        $link_paginate_video = PaginationVideo::all();
        foreach ($link_paginate_video as $item)
        {
            $url = $item->link;
            $response = Http::get($url);
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($response->body());
            libxml_use_internal_errors(false);
            $finder = new DOMXPath($doc);
            $nodes= $finder->query('//*[@class ="poster"]/a');
            foreach ($nodes as   $node)
            {
                foreach ($node->childNodes as $childNode)
                {
                    ListLinkPaginationVideo::create([
                        'paginate_id'=> $item->id,
                        'link_video_page' => $node->getAttribute('href'),
                        'title'=>$node->getAttribute('title'),
                        'image' => $childNode->getAttribute('src')
                    ]);
                }
            }
        }
        // EndLinkVideo



    }
}
