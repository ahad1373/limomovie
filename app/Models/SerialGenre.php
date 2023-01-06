<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerialGenre extends Model
{
    protected $fillable =['serial_id' , 'title'];

    use HasFactory;
}
