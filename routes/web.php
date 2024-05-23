<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::prefix('/admin')
    ->middleware('auth', 'admin')
    ->group(function(){
        Route::get('/', 'AdminController@index');
        Route::get('/pengaturan', 'AdminController@pengaturan');
        Route::patch('/perbarui_pengaturan', 'AdminController@perbarui_pengaturan');
        Route::resource('/pengguna', 'PenggunaController');
        Route::resource('/post', 'PostController');
        Route::resource('/kategori', 'KategoriController');
        Route::resource('/tag', 'TagController');
        Route::resource('/halamanstatis', 'HalamanStatisController');
        Route::resource('/slider', 'SliderController');
        Route::resource('/album', 'AlbumController');
        Route::resource('/galeri', 'GaleriController');
        Route::resource('/agenda', 'AgendaController');
        Route::resource('/menu', 'MenuController');
        Route::resource('/alur', 'AlurCampController');
        Route::resource('/testimoni', 'TestimoniController');
        Route::resource('/intro', 'IntroController');
        Route::resource('/paket', 'PaketController');
        Route::resource('/ask', 'AskController');
        Route::resource('/homeline', 'HomelineController');
        Route::get('/profil_pimpinan', 'AdminController@profil_pimpinan');
        Route::patch('/update_profil_pimpinan', 'AdminController@update_profil_pimpinan');
        Route::get('/cara_pendaftaran', 'AdminController@cara_pendaftaran');
        Route::patch('/edit_cara_pendaftaran', 'AdminController@edit_cara_pendaftaran');
        Route::get('/data_pendaftar', 'AdminController@data_pendaftar');
        Route::get('/data_pendaftarkonfirmasi', 'AdminController@data_pendaftarkonfirmasi');
        Route::patch('/konfirmasi_data_pendaftar/{id}', 'AdminController@konfirmasi_data_pendaftar');
        Route::get('/detail_data_pendaftar/{unique}', 'AdminController@detail_data_pendaftar');
        Route::get('/ajax_data_pendaftar/{unique}', 'AdminController@ajax_data_pendaftar');
        Route::get('/hapus_semua_datapendaftar', 'AdminController@hapus_semua_data_pendaftar');
    });

Route::prefix('/publishing')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', 'AdminController@index');
        Route::resource('/post', 'PostController');
        Route::resource('/kategori', 'KategoriController');
        Route::resource('/tag', 'TagController');
        Route::resource('/halamanstatis', 'HalamanStatisController');
        Route::resource('/slider', 'SliderController');
        Route::resource('/album', 'AlbumController');
        Route::resource('/galeri', 'GaleriController');
        Route::resource('/agenda', 'AgendaController');
    });

Route::get('/', 'PublicController@index');
Route::get('/pendaftaran', 'PublicController@pendaftaran');
Route::get('/cara-pendaftaran', 'PublicController@cara_pendaftaran');
Route::post('/daftardata', 'PublicController@daftardata');
Route::get('/data_terkirim/{unique}', 'PublicController@data_terkirim');
Route::get('/ask', 'PublicController@ask');
Route::get('/informasi', 'PublicController@informasi');
Route::get('/galeri', 'PublicController@galeri');
Route::get('/kontak', 'PublicController@kontak');
Route::get('/agenda', 'PublicController@agendaview');
Route::get('/program', 'PublicController@programview');
Route::get('/post/{post}', 'PublicController@post');
Route::get('/paket/{paket_seo}', 'PublicController@paket');
Route::get('/tag/{tag}', 'PublicController@tag');
Route::get('/kategori/{kategori_seo}', 'PublicController@kategori');
Route::get('/agenda/{agenda}', 'PublicController@agenda');
Route::get('/search', 'PublicController@search_berita');
Route::get('/spotlight', 'PublicController@spotlight');
Route::get('/search_agenda', 'PublicController@search_agenda');
Route::post('/mailto', 'PublicController@mailto');
Route::get('/{page}', 'PublicController@page');