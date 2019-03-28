<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
     // TODO 3 : MENGATUR ATRIBUT APA SAJA YANG DI IZINKAN UTK DI INPUTKAN
    

 // TODO 3 : 1.1 MENGATUR RELASI ANTAR TABEL 
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function form()
    {
        return $this->belongsTo('App\Models\Form');
    }



 // TODO 4  : 1.1 MENGATUR RELASI ANTAR TABEL
    public function notifs()
    {
        return $this->hasMany('App\Models\Notif');
    }

}
