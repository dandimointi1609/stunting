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
    return view('layouts/landing/landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//DESA
Route::get('desa', 'DesaController@index');
Route::get('/desa/create', 'DesaController@create');
Route::post('/desa', 'DesaController@store');
Route::get('/ubahdesa/{kd_desa}', 'DesaController@edit')->name('edit-desa');
Route::put('/desa/update/{kd_desa}', 'DesaController@update');
Route::get('/delete-desa/{kd_desa}', 'DesaController@destroy')->name('delete-desa');

//Data Kecamatan
Route::get('kecamatan', 'KecamatanController@index');
Route::get('/kecamatan/create', 'KecamatanController@create');
Route::post('/kecamatan', 'KecamatanController@store');
Route::get('/ubahkecamatan/{id_kecamatan}', 'KecamatanController@edit')->name('edit-kecamatan');
Route::put('/kecamatan/update/{id_kecamatan}', 'KecamatanController@update');
Route::get('/delete-kecamatan/{id_kecamatan}', 'KecamatanController@destroy')->name('delete-kecamatan');

//Map
Route::get('map', 'TitikController@index');
Route::get('/titik/json', 'TitikController@titik');
Route::get('/titik/lokasi/{kd_kecamatan}', 'TitikController@lokasi');

//puskes
Route::get('sebaran', 'TitikpuskesController@index');
Route::get('/puskes/json', 'TitikpuskesController@puskes');
Route::get('/puskes/lokasip/{id_puskes}', 'TitikpuskesController@lokasip');

//SEBARAN
Route::get('sebaran', 'SebaranController@index');
Route::get('/titik/json', 'SebaranController@titik');
Route::get('/titik/lokasi/{kd_kecamatan}', 'SebaranController@lokasi');
Route::get('/titik/data/{kd_kecamatan}', 'SebaranController@data');


//DATA PUSKESMAS
// Route::resource('/puskes', 'PuskesController');
Route::get('puskes', 'PuskesController@index');
Route::get('/puskes/create', 'PuskesController@create');
Route::post('/puskes', 'PuskesController@store');
Route::get('/ubahpuskes/{id_puskes}', 'PuskesController@edit')->name('edit-puskes');
Route::put('/puskes/update/{id_puskes}', 'PuskesController@update');
Route::get('/delete-puskes/{id_puskes}', 'PuskesController@destroy')->name('delete-puskes');

// //MAP PUSKESMAS
// Route::get('tambahpuskes', 'PuskesController@create');
Route::get('/puskes/json', 'PuskesController@puskes');
Route::get('/puskes/lokasip/{id_puskes}', 'PuskesController@lokasip');


//BALITA
Route::get('balita', 'BalitaController@index');
Route::get('/balita/create', 'BalitaController@create');
Route::post('/balita', 'BalitaController@store');
Route::get('/ubahbalita/{id_balita}', 'BalitaController@edit')->name('edit-balita');
Route::put('/balita/update/{id_balita}', 'BalitaController@update');
Route::get('/delete-balita/{id_balita}', 'BalitaController@destroy')->name('delete-balita');

//Dpravelensi
Route::resource('/dpravelensi', 'DpravelensiController');
Route::get('dpravelensi', 'DpravelensiController@index');
Route::get('/dpravelensi/create', 'DpravelensiController@create');
Route::post('/dpravelensi', 'DpravelensiController@store');
Route::get('/ubahdpravelensi/{id}', 'DpravelensiController@edit')->name('edit-dpravelensi');
Route::put('/dpravelensi/update/{id}', 'DpravelensiController@update');
Route::get('/delete-dpravelensi/{id}', 'DpravelensiController@destroy')->name('delete-dpravelensi');

//laporan
Route::get('laporan', 'LaporanController@index');
Route::get('/penderitaexport', 'LaporanController@penderitaexport')->name('penderitaexport');
Route::get('/penderitapdf', 'LaporanController@penderitapdf')->name('penderitapdf');


//sebaran
// Route::get('sebaran', 'SebaranController@index');
//Map sebaran
// Route::get('sebaran', 'SebaranController@index');
// Route::get('/titik/json', 'SebaranController@titik');
// Route::get('/titik/lokasi/{kd_kecamatan}', 'SebaranController@lokasi');
//pravelensi
Route::get('pravelensi', 'PravelensiController@index');
