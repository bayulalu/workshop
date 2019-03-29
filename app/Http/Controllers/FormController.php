<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Form;
use Illuminate\Http\Request;


class FormController extends Controller
{

    public function index(Request $request)
    {
        // TODO 2 : 2.9 MEMBUAT SISTEM PENCARIAN PADA FORM
        $search_q = urlencode($request->input('cari'));

        if(!empty($search_q)){
             $forms = Form::where('title', 'like', '%'.$search_q.'%')->get();
            }else{
        // TODO 2 : 2.2 MENAMPILKAN DATA DARI DATABASE
                $forms = Form::all();
            }
            
        return view('welcome', compact('forms'));
    }

    public function create(){
        // TODO 2 : 2.4 MENAMPILKAN FORM INPUTAN
        return view('form.create');
    }  
    
    public function store(Request $request)
    {
        // TODO 2 : 2.6 Menvalidasi data dan menyimpan data ke dalam database 
        $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
        ]);
            
        $slug = str_slug($request->title, '-');

        if(Form::where('slug', $slug)->first() != null)
            $slug = $slug . '-' .time();

        $form = Form::create([
            'title' => $request->title,
            'slug' => $slug,
            'subject' => $request->subject,
            'user_id' => Auth::user()->id
        ]);

        return redirect('/')->with('msg', 'Pertanyaan Berhasil diBuat');
    }


    public function singgle($slug)
    {
        // TODO 2 : 2.8 MENAMPILKAN DATA YANG DI KELIK / DI PILIH
        // findOrFail
        $form = Form::where('slug', $slug)->get();
        return view('form.singgle', compact('form'));
       
    }

    public function destroy($id)
    {
        // TODO 2 : 2.10 MEMBUAT FUNGSI HAPUS 
        $form = Form::findOrFail($id);
        $form->delete();
       
        return redirect('/')->with('msg-hapus', 'Pertanyaan Berhasil Di Hapus');
   
    }

    public function edit($slug)
    {
        // TODO 2 : 2.12 FUNGSI MENAMPILKAN HALAMAN EDIT
        $form = Form::where('slug', $slug)->get();
        return view('form.edit', compact('form'));
    }

    public function update(Request $request, $id){
       
       // TODO 2 : 2.14 FUNGSI MENYIMPAN PERUBAHAN  

       $this->validate($request, [
            'title' => 'required|min:3',
            'subject' => 'required|min:5'
        ]);

        $form =Form::findOrFail($id);
        
        $form->update([
            'title' => $request->title,
            'subject' => $request->subject,
        ]);

        return redirect('/')->with('msg', 'Pertanyaan Berhasil di Edit');
     
        
    }

   
}
