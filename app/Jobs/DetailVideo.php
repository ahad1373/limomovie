<?php

namespace App\Jobs;

use App\Models\ActorVideo;
use App\Models\CategoryVideo;
use App\Models\ListLinkPaginationVideo;
use App\Models\VideoGenre;
use DOMDocument;
use DOMXPath;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class DetailVideo implements ShouldQueue
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


        // DetailVideo
        \App\Models\Video::truncate();
        VideoGenre::truncate();
        ActorVideo::truncate();
        $link_video =  ListLinkPaginationVideo::all();
        foreach ($link_video as $link)
        {
            $url = $link->link_video_page;
            $response = Http::get($url);
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTML($response->body());
            libxml_use_internal_errors(false);
            $finder = new DOMXPath($doc);
            ///////////list query video  /////////////////////
            $posters= $finder->query('//*[@class ="poster-detail"]//*[@class ="poster"]/img');
            $d_titles= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li/strong');
            $d_imdb= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li//*[@class ="fw-bold"][1]');
            $d_times= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li[last()]');
            $d_languages= $finder->query('/html[1]/body[1]/div[1]/div[2]/div[1]/div[1]/div[1]/div[1]/div[2]/ul[1]/li[last()-1]/span[1]');
            $d_countries= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li[last()-2]/a');
            $d_ages= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li[last()-3]/a');
            $d_synopsis= $finder->query("//div[@id='summary']//span[1]");
            $d_directors= $finder->query("//span[contains(text(),'کارگردان :')]");
            $d_writers= $finder->query("//span[contains(text(),'نویسنده :')]");
            $d_downloadlinks= $finder->query('//*[@class ="downloadlinks text-center"]');
            $d_genres= $finder->query('//*[@class ="poster-detail"]//*[@class ="detail"]/ul/li[last()-4]/a');
            $d_actors= $finder->query('//*[@class ="cast"]/li[1]/a');
            ///////////////////////////////////////////////////
            foreach ($d_downloadlinks as $d_downloadlink)
            {
                $id = $d_downloadlink->getAttribute('id');
            }


            foreach ($d_writers as $writer)
            {
                if (!is_null($writer->nextSibling))
                {
                    $nevisande = $writer->nextSibling->data;
                }else{$nevisande = 'درج نشده';}
            }

            foreach ($d_directors as $director)
            {
                if (!is_null($director->nextSibling))
                {
                    $director =$director->nextSibling->data;
                }else{$director = 'مشخص نشده';}
            }




            if (!is_null($d_synopsis))
            {
                foreach ($d_synopsis as   $synopsis)
                {
                    if (!is_null($synopsis->nextSibling))
                    {
                        $kholase =$synopsis->nextSibling->data;
                    }else{$kholase = 'مشخص نشده';}
                }
            }else{$kholase = 'مشخص نشده';}


            foreach ($d_languages as $language) {
                if (!is_null($language->nextSibling))
                {
                    if ($language->nextSibling->childNodes->length != 0)
                    {
                        foreach ($language->nextSibling->childNodes as $lang)
                        {
                            $language = $lang->data;
                        }
                    } else{$language = $language->nextSibling->data;}
                }else{$language = 'درج نشده';}
            }


            if (!is_null($d_ages))
            {
                foreach ($d_ages as $age)
                {
                    foreach ($age->childNodes as $item)
                    {
                        $sen = $item->data;
                    }
                }
            }else{$sen = 'مشخص نشده';}

            if (!is_null($d_countries))
            {
                foreach ($d_countries as $country)
                {
                    foreach ($country->childNodes as $value)
                    {
                        $keshvar = $value->data;
                    }
                }
            } else{$keshvar = 'ذکر نشده';}



            if (!is_null($d_times))
            {
                foreach ($d_times as $time)
                {
                    $time =$time->lastChild->data;
                }
            }else {$time= 'عنوان نشده';}

            if (!is_null($posters))
            {
                foreach ($posters as $poster){
                    $original_title =  $poster->getAttribute('title');
                    $image =$poster->getAttribute('src');
                }
            }else {  $original_title =  'وجود ندارد';
                $image ='وجود ندارد';
            }

            if (!is_null($d_titles))
            {
                foreach ($d_titles as $d_title)
                {
                    foreach ($d_title->childNodes as  $childNode)
                    {
                        $persian_title = $childNode->data;
                    }
                }
            }else{$persian_title = 'عنوان نشده';}

            if (!is_null($d_imdb))
            {
                foreach ($d_imdb as $imdb)
                {
                    foreach ($imdb->childNodes as $imd)
                    {
                        $IMDB =$imd->data;
                    }
                }
            }else{$IMDB = 'امتیازی وجود ندارد';}

           $video = \App\Models\Video::create([
                'imdb' => $IMDB ,
                'video_id' => $id ,
                'persian_title' => $persian_title ,
                'original_title' => $original_title,
                'image' => $image,
                'time'=> $time,
                'language' => $language,
                'country'=> $keshvar,
                'age_category' => $sen,
                'synopsis'=> $kholase,
                'director' => $director,
                'writer'=>$nevisande,
               'category_id'=>1
            ]);
            $video->categories()->sync(['categories' => 1]);
            foreach ($d_genres as $genre)
            {
                foreach ($genre->childNodes as $item)
                {
                    $genre_title = $item->data;
                    VideoGenre::create([
                        'video_id' => $id,
                        'genre_title' => $genre_title
                    ]);
                }
            }

            foreach ($d_actors as $actor)
            {
                foreach($actor->childNodes as $act)
                {
                    $actor_title = $act->data;
                    ActorVideo::create([
                        'video_id' => $id ,
                        'actor_title' => $actor_title
                    ]);
                }
            }
        }
        // EndDetailVideo
    }
}
