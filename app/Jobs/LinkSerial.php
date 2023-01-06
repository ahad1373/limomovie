<?php

namespace App\Jobs;

use App\Models\ListLinkPaginationSerial;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class LinkSerial implements ShouldQueue
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
        //  LinkSerial
        ListLinkPaginationSerial::truncate();
        $link_paginate_serial = \App\Models\PaginationSerial::all();
        foreach ($link_paginate_serial as $item)
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
                    ListLinkPaginationSerial::create([
                        'paginate_id'=> $item->id,
                        'link_serial_page' => $node->getAttribute('href'),
                        'title'=>$node->getAttribute('title'),
                        'image' => $childNode->getAttribute('src')
                    ]);

                }
            }
        }
        // EndSerial

    }
}
