<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorVideo extends Model
{
    protected $fillable =['video_id' , 'actor_title'];
    use HasFactory;
}
