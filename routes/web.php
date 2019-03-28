<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// TODO 2 : 2.1 MENAMPILKAN DATA DARI DATABASE
Route::get('/', 'FormController@index');

Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    // TODO 2 : 2.3 MENAMPILKAN FORM INPUTAN
    Route::get('/create', 'FormController@create');

    // TODO 2 : 2.5 URL KONTOLER 
    Route::post('/', 'FormController@store');

    // TODO 2 : 2.12 URL MENAMILKAN DAN MENYIMPAN PERUBAHAN
   
    // TODO 2 : 2.9 URL HAPUS
    
    // TODO 3 : 1.2 URL TANGGAPAN (KOMENTAR )
   
});

// TODO 4 : 1.2 URL MEMBUAT NOTIFIKASI (PEMBERITAHUAN)


Route::get('/home', 'HomeController@index')->name('home');

// TODO 2 : 2.7 MENAMPILKAN DATA YANG DI KELIK / DI PILIH

