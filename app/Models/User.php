<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'staff',
        'super',
        'Newsletters',
        'number_card',
        'national_code' ,
        'viptime'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isActive()
    {
        return $this->viptime > Carbon::now() ? true : false;
    }

    public function Staff()
    {
        return $this->staff;
    }

    public function Super()
    {
        return $this->super;
    }

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return !! $this->roles->intersect($role ,$this->roles)->all();
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('title' , $permission->title) || $this->hasRole($permission->roles);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function similars_video()
    {
        return $this->hasMany(SimilarVideo::class);
    }
    public function similars_serial()
    {
        return $this->hasMany(SimilarSerial::class);
    }

    public function Address()
    {
        return $this->hasMany(Address::class);
    }


    public function videos()
    {
        return $this->hasMany(Video::class);
    }


    public function interests()
    {
        return $this->hasMany(Interest::class);
    }



}
