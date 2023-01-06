<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGenre extends Model
{
    protected $fillable = ['video_id' , 'genre_title'];


    use HasFactory;
}
