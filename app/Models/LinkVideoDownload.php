<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkVideoDownload extends Model
{
    protected $fillable =['video_id' , 'title' , 'link' , 'subtitle'];
    use HasFactory;
}
