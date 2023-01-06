<?php

namespace App\Jobs;

use App\Models\LinkVideoDownload;
use App\Models\ListLinkPaginationVideo;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SaveLinkVideo implements ShouldQueue
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
        $videos=ListLinkPaginationVideo::all();
        LinkVideoDownload::truncate();
        foreach ($videos as $video)
        {
            $url = $video->link_video_page;
            $response = Http::get($url);
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($response->body());
            libxml_use_internal_errors(false);
            $finder = new DOMXPath($doc);
            $d_downloadlinks= $finder->query('//*[@class ="downloadlinks text-center"]');
            foreach ($d_downloadlinks as $d_downloadlink)
            {
                $id = $d_downloadlink->getAttribute('id');
            }
            $ch = curl_init('https://almasmovie.website/wp-admin/admin-ajax.php');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ['id' => $id,'posttype'=>'movie','action' => 'getPostLinksAjax']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_ENCODING,"");
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            header('Content-Type: text/html');
            $data = curl_exec($ch);
            $doocuments = new DOMDocument();
            if ($doocuments->loadHTML($data))
            {
                $doocuments->loadHTML($data);

                libxml_use_internal_errors(true);
                libxml_use_internal_errors(false);

                $search = new DOMXPath($doocuments);

                $titles = $search->query('//h3');
                if (!is_null($titles->item(0)))
                {
                    $title = $titles->item(0)->firstChild->data;
                    $link_download = $titles->item(0)->nextSibling->firstChild->getAttribute('href');
                    $link_subtitle = $titles->item(0)->nextSibling->lastChild->getAttribute('href');
                    LinkVideoDownload::create([
                        'video_id' => $id,
                        'title' => $title ,
                        'link' => $link_download ,
                        'subtitle' => $link_subtitle
                    ]);
                }
                if (!is_null($titles->item(1)))
                {
                    $title = $titles->item(1)->firstChild->data;
                    $link_download = $titles->item(1)->nextSibling->firstChild->getAttribute('href');
                    $link_subtitle = $titles->item(1)->nextSibling->lastChild->getAttribute('href');
                    LinkVideoDownload::create([
                        'video_id' => $id,
                        'title' => $title ,
                        'link' => $link_download ,
                        'subtitle' => $link_subtitle
                    ]);
                }
            }
        }
    }
}
