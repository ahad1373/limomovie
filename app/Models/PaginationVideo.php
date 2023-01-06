<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaginationVideo extends Model
{
    protected $fillable = ['last-page' , 'link'];
    use HasFactory;
}
