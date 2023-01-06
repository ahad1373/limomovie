<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['video_id' , 'imdb' , 'original_title' , 'genre' , 'age_category' , 'country' ,
                            'language' , 'time' , 'synopsis' , 'persian_title' , 'director' , 'writer' ,
                           'status' , 'image' , 'new' , 'special' , 'category_id'
                           ];
    use HasFactory;




    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
