<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{

    protected $fillable = ['original_title' , 'img'  , 'persian_title' , 'age_category' , 'country' ,
        'language' , 'time' , 'broadcast_network' , 'synopsis'  , 'directors'  ,
        'status' , 'serial_id' , 'imdb' , 'new' , 'special' , 'category_id'
    ];


    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    use HasFactory;
}
