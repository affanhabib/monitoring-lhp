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
Route::get('/tambah-pengiriman-laporan', function () { return view('tambahLaporan'); })->middleware(['checkRole:tl']);
// Route::get('/konfirmasi-pengiriman', function () { return view('livewire/map-location'); })->middleware('checkRole:pengirim,tl');
//Route::get('/konfirmasi-pengiriman', function () { return view('konfirmasiPengiriman'); })->middleware('checkRole:pengirim,tl');
Route::resource('/konfirmasi-pengiriman', 'KonfirmasiLaporanController')->middleware('checkRole:pengirim,tl');
//Route::get('/tindak-lanjut', function () { return view('tindakLanjut'); })->middleware('checkRole:tl');
Route::resource('/tindak-lanjut', 'TindakLanjutController')->middleware(['checkRole:tl']);
Route::get('/tindak-lanjut/{tindak_lanjut}/create','TindakLanjutController@createTindakLanjut')->name('tindak-lanjut.createtindaklanjut')->middleware(['checkRole:tl']);
Route::match(['put', 'patch'],'/tindak-lanjuts/{tindak_lanjut}','TindakLanjutController@storeTindakLanjut')->name('tindak-lanjuts.storetindaklanjut')->middleware(['checkRole:tl']);