<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLinkPaginationVideo extends Model
{
    protected $fillable = ['paginate_id' ,'link_video_page' , 'title' , 'image'];
    use HasFactory;



}
