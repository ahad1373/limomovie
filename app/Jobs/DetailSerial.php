<?php

namespace App\Jobs;

use App\Models\CategorySerial;
use App\Models\ListLinkPaginationSerial;
use App\Models\Serial;
use App\Models\SerialActor;
use App\Models\SerialGenre;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class DetailSerial implements ShouldQueue
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
        $series=ListLinkPaginationSerial::all();
        Serial::truncate();
        SerialGenre::truncate();
        SerialActor::truncate();
        foreach ($series as $serial) {
            $url = $serial->link_serial_page;
            $response = Http::get($url);
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($response->body());
            libxml_use_internal_errors(false);
            $finder = new DOMXPath($doc);
            ///////////list query video  /////////////////////
            $posters = $finder->query('//*[@class ="poster-detail"]//*[@class ="poster"]/img');
            $d_titles = $finder->query("//span[contains(text(),'نام سریال :')]");
            $d_imdb= $finder->query('//*[@class ="fw-bold"]');
            $d_genres = $finder->query("//span[contains(text(),'ژانر :')]");
            $d_age= $finder->query("//span[contains(text(),'رده سنی :')]");
            $d_country= $finder->query("//span[contains(text(),'کشور سازنده :')]");
            $d_language= $finder->query("//span[contains(text(),'زبان :')]");
            $d_time= $finder->query("//span[contains(text(),'مدت زمان :')]");
            $d_show= $finder->query("//span[contains(text(),'شبکه پخش :')]");
            $d_director= $finder->query("//span[@class='display-inlineblock direction:ltr;']");
            $d_synopsis= $finder->query("//div[@id='summary']");
            $d_actors= $finder->query("//span[contains(text(),'ستارگان :')]");
            $d_serial_id= $finder->query('//*[@class = "downloadlinks"]');

            ///////////end list query video  /////////////////////

            $serial_id = $d_serial_id->item(0)->getAttribute('id');


            if (!is_null($posters)) {
                foreach ($posters as $poster) {
                    $original_title = $poster->getAttribute('title');
                    $image = $poster->getAttribute('src');
                }
            } else {
                $original_title = 'وجود ندارد';
                $image = 'وجود ندارد';
            }


            if ($d_titles->length != 0) {
                foreach ($d_titles as $d_title) {
                    if ($d_title->nextSibling->nodeName == "strong")
                    {
                        foreach ($d_title->nextSibling->childNodes as $childNode) {
                            $persian_title = $childNode->data;
                        }
                    }else {
                        $persian_title = $original_title;
                    }
                }
            } else {
                $persian_title = $original_title;
            }




            if ($d_imdb->length !=0)
            {
                foreach ($d_imdb->item(0)->childNodes as $childNode)
                {
                    $IMDB = $childNode->data;
                }
            }else{$IMDB = 'امتیازی درج نشده';}

            if ($d_country->length != 0)
            {
                foreach ($d_country as $value)
                {
                    if ($value->parentNode->lastChild->nodeName == "a")
                    {
                        foreach ($value->parentNode->lastChild->childNodes as $country)
                        {
                            $keshvar =$country->data;
                        }
                    }else{$keshvar = 'ومشخص نشده';}

                }
            }else{$keshvar = 'ومشخص نشده';}

            if ($d_language->length !=0)
            {
                foreach ($d_language as $language)
                {
                    if ($language->nextSibling->nodeName != "span")
                    {
                        $language_film = $language->nextSibling->data ;
                    }else{$language_film = $language->nextSibling->firstChild->data;}

                }
            }else{$language_film = 'مشخص نشده';}


            if ($d_time->length != 0)
            {
                foreach ($d_time as $times)
                {
                    if ($times->nextSibling->nodeName == "#text")
                    {
                        $time = $times->nextSibling->data;
                    }else{$time = 'وارد نشده';}
                }
            }else{$time = 'وارد نشده';}


            if ($d_show->length != 0)
            {
                foreach ($d_show as $shows)
                {
                    if ($shows->nextSibling->nodeName == "a")
                    {
                        foreach ($shows->nextSibling->childNodes as $show)
                        {
                            $network = $show->data;
                        }
                    }else{$network = 'وارد نشده';}
                }
            }else{$network = 'وارد نشده';}


            if ($d_director->length != 0)
            {
                foreach ($d_director as $director)
                {
                    if ($director->childNodes->length!= 0)
                    {
                        foreach ($director->childNodes as $node)
                        {
                            $directors =$node->data;
                        }
                    }else{$directors = 'وارد نشده';}
                }
            }else{$directors = 'وارد نشده';}

            if($d_synopsis->length != 0)
            {

                if ($d_synopsis->item(0)->lastChild->nodeName == "#text")
                {
                    $synopsis = $d_synopsis->item(0)->lastChild->data;
                }else{$synopsis = 'خلاصه ای عنوان نشده';}
            }else{$synopsis = 'خلاصه ای عنوان نشده';}

            if ($d_age->length !=0)
            {
                foreach ($d_age as $age)
                {
                    if ($age->nextSibling->nodeName == "a")
                    {
                        foreach ($age->nextSibling->childNodes as $ag)
                        {
                            $sen =$ag->data;
                        }
                    }else{$sen = 'مشخص نشده';}

                }
            }else{$sen = 'مشخص نشده';}



           $serial = Serial::create([
                'original_title' => $original_title,
                'img' => $image,
                'persian_title'=>$persian_title,
                'imdb'=> $IMDB,
                'country'=>$keshvar,
                'language'=>$language_film,
                'time' => $time,
                'broadcast_network'=> $network,
                'directors' => $directors,
                'synopsis'=> $synopsis,
                'age_category' => $sen,
                'serial_id' => $serial_id,
                'category_id' => 2
            ]);




            if ($d_genres->length != 0) {
                foreach ($d_genres as $d_genre) {
                    if ($d_genre->nextSibling->nodeName == "a") {
                        foreach ($d_genre->nextSibling->childNodes as $childNode) {
                            $genres = $childNode->data;
                            SerialGenre::create([
                                'serial_id' => $serial_id,
                                'title' => $genres
                            ]);
                        }
                    }
                    else{
                        $genres = 'وارد نشده';
                        SerialGenre::create([
                            'serial_id' => $serial_id,
                            'title' => $genres
                        ]);
                    }
                }
            } else {
                $genres = 'وارد نشده';
                SerialGenre::create([
                    'serial_id' => $serial_id,
                    'title' => $genres
                ]);
            }


            $actors = $d_actors->item(0)->parentNode->childNodes;
            if (!is_null($actors->item(2)))
            {
                if ($actors->item(2)->nodeName == "a")
                {
                    foreach ($actors->item(2)->childNodes as $item)
                    {
                        $actor = $item->data;
                        SerialActor::create([
                            'serial_id'=> $serial_id ,
                            'title'=>$actor
                        ]);
                    }
                }
            }
            if (!is_null($actors->item(4)))
            {
                if ($actors->item(4)->nodeName == "a")
                {
                    foreach ($actors->item(4)->childNodes as $item)
                    {
                        $actor = $item->data;
                        $actor = $item->data;
                        SerialActor::create([
                            'serial_id'=> $serial_id ,
                            'title'=>$actor
                        ]);
                    }
                }
            }
            if (!is_null($actors->item(6)))
            {
                if ($actors->item(6)->nodeName == "a")
                {
                    foreach ($actors->item(6)->childNodes as $item)
                    {
                        $actor = $item->data;
                        $actor = $item->data;
                        SerialActor::create([
                            'serial_id'=> $serial_id ,
                            'title'=>$actor
                        ]);
                    }
                }
            }
            if (!is_null($actors->item(8)))
            {
                if ($actors->item(8)->nodeName == "a")
                {
                    foreach ($actors->item(8)->childNodes as $item)
                    {
                        $actor = $item->data;
                        $actor = $item->data;
                        SerialActor::create([
                            'serial_id'=> $serial_id ,
                            'title'=>$actor
                        ]);
                    }
                }
            }

        }
        }
}
