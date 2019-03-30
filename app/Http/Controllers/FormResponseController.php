<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notif;
use App\Models\Form;
use App\Models\FormResponse;
use Illuminate\Http\Request;

class FormResponseController extends Controller
{
    public function store(Request $request, $id)
    {
         // TODO 3 : 1.3 MEMVALIDASI DAN MENYIMPAN TANGGAPAN(KOMENTAR) DARI USER
       $this->validate($request, [
            'subject' => 'required'
       ]);

       $form = Form::findOrFail($id);

       $formResponse = FormResponse::create([
           'subject' => $request->subject,
           'form_id' => $id,
           'user_id' => Auth::user()->id
       ]);

      // TODO 4 : 1.2 MENGIRIM NOTIFIKASI KE USER
      if($form->user->id != Auth::user()->id){
            Notif::create([
                'subject' => 'Ada Tanggapan dari'. Auth::user()->name,
                'user_id' => $form->user->id,
                'form_id' => $id,
                'seen' => 0
            ]);
      }
        


      return redirect('/'.$form->slug)->with('msg', 'Anda Berhasil Menanggapi');
    
        
    }
}
