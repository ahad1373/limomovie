<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   protected $fillable = ['rank' , 'title' , 'commentable_id' , 'commentable_type' , 'comment' , 'parent' ,'approve'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class , 'parent','id');
    }

    public function film()
    {
        return $this->belongsTo(Video::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }


    use HasFactory;
}
