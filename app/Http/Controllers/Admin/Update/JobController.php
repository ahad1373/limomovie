<?php

namespace App\Http\Controllers\Admin\Update;

use App\Http\Controllers\Controller;
use App\Jobs\DetailSerial;
use App\Jobs\DetailVideo;
use App\Jobs\LinkSerial;
use App\Jobs\LinkVideo;
use App\Jobs\SaveLinkSerial;
use App\Jobs\SaveLinkVideo;
use App\Jobs\Serial;
use App\Jobs\Video;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function pagination_video()
    {
        $video = new Video();
        $this->dispatch($video);
        return back();
    }

    public function pagination_serial()
    {
        $serial = new Serial();
        $this->dispatch($serial);
        return back();
    }

    public function link_video()
    {
        $link_video = new LinkVideo();
        $this->dispatch($link_video);
        return back();
    }


    public function link_serial()
    {
        $link_serial= new LinkSerial();
        $this->dispatch($link_serial);
        return back();
    }


    public function detail_video()
    {
        $detail_video = new DetailVideo();
        $this->dispatch($detail_video);
        return back();
    }


    public function detail_serial()
    {
        $detail_serial = new DetailSerial();
        $this->dispatch($detail_serial);
        return back();
    }


    public function download_link_video()
    {
        $download_video = new SaveLinkVideo();
        $this->dispatch($download_video);
        return back();
    }

    public function download_link_serial()
    {
        $download_serial = new SaveLinkSerial();
        $this->dispatch($download_serial);
        return back();
    }

}
