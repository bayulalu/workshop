<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Notif;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('home', compact('user'));
    }

    

    public function notif()
    {
         // TODO 4 : 1.3 Mengupdate notifikasi setalah di kelik
       $user = Auth::user();
       $notifs = Notif::where('user_id', $user->id)->orderBy('id', 'desc')->get();
       $notif_model = new Notif;

       return view('notif', compact('user', 'notifs', 'notif_model'));
    }
}
