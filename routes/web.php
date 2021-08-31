<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('tl', function () { return view('tl'); })->middleware(['checkRole:tl']);
// Route::get('pengirim', function () { return view('pengirim'); })->middleware(['checkRole:pengirim,tl']);
//Route::get('/daftar-pengiriman-laporan', function () { return view('daftarPengiriman'); })->middleware(['checkRole:pengirim,tl']);
Route::resource('/daftar-pengiriman-laporan', 'LaporanController')->middleware('checkRole:pengirim,tl');
Route::get('/daftar-laporan-terkirim', 'LaporanController@terkirim')->middleware(['checkRole:tl']);
//Route::get('/tambah-pengiriman-laporan', function () { return view('tambahLaporan'); })->middleware(['checkRole:tl']);