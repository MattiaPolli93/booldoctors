<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'expire_date', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function detail()
    {
        return $this->hasOne("App\Detail");
    }

    public function comments()
    {
        return $this->hasMany("App\Comment");
    }

    public function messages()
    {
        return $this->hasMany("App\Message");
    }

    public function services()
    {
        return $this->hasMany("App\Service");
    }

    public function specializations()
    {
        return $this->belongsToMany("App\Specialization");
    }
}