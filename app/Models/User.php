<?php

// Todo - 01 : 1.1 MERAPIKAN STRUKTUR FOLDER AUTH 
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // TODO 3 : 1.1 MENGATUR RELASI ANTAR TABEL 
    public function forms(){
        return $this->hasMany('App\Models\Form');
    }

    public function responses()
    {
        return $this->hasMany('App\Models\FormResponse');
    }

    public function notifs()
    {
        return $this->hasMany('App\Models\Notif');
    }


}
