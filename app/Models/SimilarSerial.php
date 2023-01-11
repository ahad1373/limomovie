<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimilarSerial extends Model
{
    protected $fillable = ['similar_id' , 'similarable_id' , 'similarable_type'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function similarable()
    {
        return $this->morphTo();
    }
    use HasFactory;
}
