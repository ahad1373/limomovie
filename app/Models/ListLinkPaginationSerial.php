<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListLinkPaginationSerial extends Model
{
    protected $fillable = ['paginate_id' ,'link_serial_page' , 'title' , 'image'];
    use HasFactory;
}
