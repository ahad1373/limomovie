<?php

namespace App\Jobs;

use App\Models\AddLinkSerial;
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

class SaveLinkSerial implements ShouldQueue
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
        AddLinkSerial::truncate();
        $serials = ListLinkPaginationSerial::all();
        foreach ($serials as $serial)
        {
            $url= $serial->link_serial_page;
            $response = Http::get($url);
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($response->body());
            libxml_use_internal_errors(false);
            $finder = new DOMXPath($doc);
            $d_downloadlinks = $finder->query('//*[@class ="downloadlinks"]');
            foreach ($d_downloadlinks as $d_downloadlink)
            {
                $id = $d_downloadlink->getAttribute('id');
            }
            $ch = curl_init('https://almasmovie.website/wp-admin/admin-ajax.php');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, ['id'=> $id, 'posttype' => 'tvshow','action' => 'getPostLinksAjax']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_ENCODING,"");
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            header('Content-Type: text/html');
            $data = curl_exec($ch);
            $document = new DOMDocument('2.0' , 'UTF-8');
            libxml_use_internal_errors(true);
            $document->loadHTML('<?xml encoding="utf-8" ?>'.$data);
            libxml_use_internal_errors(false);
            $search = new DOMXPath($document);
            $titles= $search->query("//h3[@class='text-center']");

            if ($titles->length != 0)
            {
                foreach ($titles as $key=>$title)
                {
                    if ($title->nextSibling->nodeName == "p")
                    {
                        if ($title->nextSibling->nextSibling->nodeName == "p")
                        {
                            $link_download = $title->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->firstChild->getAttribute('href');
                            $link_subtitle = $title->nextSibling->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->nextSibling->nextSibling->firstChild->getAttribute('href');
                        } else
                        {

                            $link_download = $title->nextSibling->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->firstChild->getAttribute('href');
                            $link_subtitle = $title->nextSibling->nextSibling->nextSibling->nextSibling->lastChild->previousSibling->previousSibling->previousSibling->firstChild->getAttribute('href');
                        }
                    }
                    else
                    {
                        $link_download = $title->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->firstChild->getAttribute('href');
                        $links_subtitle = $title->nextSibling->nextSibling->nextSibling->firstChild->nextSibling->nextSibling->nextSibling->childNodes;
                        foreach ($links_subtitle as $subtitle)
                        {
                            $link_subtitle = $subtitle->getAttribute('href');
                        }
                    }
                    $title_download = 'فصل ' . $key+1;
                    AddLinkSerial::create([
                        'serial_id' => $id,
                        'title' => $title_download,
                        'link'=> $link_download,
                        'subtitle'=> $link_subtitle
                    ]);

                }
            }






        }
    }
}
