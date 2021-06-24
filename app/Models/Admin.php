<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminPasswordResetNotification;

class Admin extends Authenticatable
{
    //@var array
    use Notifiable;

    protected $fillable = [
        'name','email','password',
    ];

    //hidden for arrays
    //  @var array
    protected $hidden = [
        'password','remembertoken',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendPasswordResetNotification($token)
    {
            $this->notify(new AdminPasswordResetNotification($token));
       }

}
