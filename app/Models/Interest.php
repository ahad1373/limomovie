<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [ 'title' , 'interestable_id' , 'interestable_type'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function interestable()
    {
        return $this->morphTo();
    }
    use HasFactory;
}
