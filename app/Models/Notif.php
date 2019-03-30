<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    // TODO 4 : MEBERIKAN IZIN
    protected $fillable = [
        'subject','seen','form_id', 'user_id'
   ];


   // TODO 4 :1 RELASI

   public function user()
   {
       return $this->belongsTo('App\Models\User');
   }

   public function form()
   {
       return $this->belongsTo('App\Models\Form');
   }
}
