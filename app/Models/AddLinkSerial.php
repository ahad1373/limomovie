<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddLinkSerial extends Model
{
    protected $fillable = ['serial_id' , 'title' , 'link' , 'subtitle'];
    use HasFactory;
}
