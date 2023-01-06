<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['title' , 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    use HasFactory;
}
