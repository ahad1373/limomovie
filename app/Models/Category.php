<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title' , 'parent'  , 'slug' , 'description' ];

    public function child()
    {
        return $this->hasMany(Category::class , 'parent','id');
    }


    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }


    public function serials()
    {
        return $this->belongsToMany(Serial::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    use HasFactory;
}
