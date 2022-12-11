<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('homepage');
// });

//LANDING
Route::get('homepage', 'LandingController@index');
Route::get('/', 'LandingController@index');
Route::get('/titik/json', 'LandingController@titik');
Route::get('/titik/lokasi/{kd_kecamatan}', 'LandingController@lokasi');
Route::get('/titik/data/{kd_kecamatan}', 'LandingController@data');
Route::get('/sebaranpertanggal/{tglawal}/{tglakhir}/{fkecamatan}', 'LandingController@sebaranpertanggal')->name('sebaranpertanggal');
Route::get('/sebaranpertanggal/{tglawal}/{tglakhir}/', 'LandingController@sebaranpertanggalrange')->name('sebaranpertanggal');
Route::get('/sebaranpertanggal/', 'LandingController@sebaranpertanggalall')->name('sebaranpertanggal');
Route::get('/homeexport/{tglawal}/{tglakhir}', 'LandingController@homeexport')->name('homeexport');
Route::get('/homeexport///{fkecamatan}', 'LandingController@homeexportk')->name('homeexport');

// Route::get('/homeexport/{tglawal}/{tglakhir}', 'LandingController@homeexport')->name('homeexport');
// Route::get('/homeexport/', 'LandingController@homeexport')->name('homeexport');



//pravelensi
Route::get('pravelensi/{fkecamatan}', 'PravelensiController@index');
Route::get('/getdesa', 'PravelensiController@getDesa');
Route::get('/pravelensipertanggal///{filterkecamatan}', 'PravelensiController@pravelensipertanggalf')->name('pravelensipertanggal');
Route::get('/pravelensipertanggal/{tglawal}/{tglakhir}/{filterkecamatan}', 'PravelensiController@pravelensipertanggal')->name('pravelensipertanggal');
Route::get('/pravelensipertanggal/', 'PravelensiController@pravelensipertanggalall')->name('pravelensipertanggal');
Route::get('/gpravelensi/{filterkecamatan}', 'PravelensiController@gpravelensi')->name('gpravelensi');



// Route::get('/hompage/export-filter', 'UserController@filter')->name('penderitaexport');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {

    Route::get('profile', 'ProfileController@edit')
        ->name('profile.edit');

    Route::patch('profile', 'ProfileController@update')
        ->name('profile.update');
});

Route::resource('/home', 'HomeController');
Route::get('/edit/{id}', 'HomeController@edit')->name('edit-pengguna');
Route::put('/home/update/{id}', 'HomeController@update');


//DESA
Route::get('desa', 'DesaController@index');
Route::get('/desa/create', 'DesaController@create');
Route::post('/desa', 'DesaController@store');
Route::get('/ubahdesa/{kd_desa}', 'DesaController@edit')->name('edit-desa');
Route::put('/desa/update/{kd_desa}', 'DesaController@update');
Route::get('/delete-desa/{kd_desa}', 'DesaController@destroy')->name('delete-desa');

//PREDIKSI
Route::get('prediksi', 'PrediksiController@index');
Route::get('/prediksi/create', 'PrediksiController@create');
Route::post('/prediksi', 'PrediksiController@store');
Route::get('/ubahprediksi/{id_prediksi}', 'PrediksiController@edit')->name('edit-prediksi');
Route::put('/prediksi/update/{id_prediksi}', 'PrediksiController@update');
Route::get('/delete-prediksi/{id_prediksi}', 'PrediksiController@destroy')->name('delete-prediksi');

//FORECASTING
Route::get('forecasting', 'ForecastingController@index');
Route::get('/forecasting/create', 'ForecastingController@create');
Route::post('/forecasting', 'ForecastingController@store');
Route::get('/ubahalpha/{id_alpha}', 'ForecastingController@edit')->name('edit-forecasting');
Route::put('/forecasting/update/{id_alpha}', 'ForecastingController@update');
Route::get('/delete-forecasting/{id_forecasting}', 'ForecastingController@destroy')->name('delete-forecasting');

//Data Kecamatan
Route::resource('/kecamatan', 'KecamatanController');
Route::get('kecamatan', 'KecamatanController@index');
Route::get('/kecamatan/create', 'KecamatanController@create');
Route::post('/kecamatan', 'KecamatanController@store');
Route::get('/ubahkecamatan/{id_kecamatan}', 'KecamatanController@edit')->name('edit-kecamatan');
Route::put('/kecamatan/update/{id_kecamatan}', 'KecamatanController@update');
Route::get('/delete-kecamatan/{id_kecamatan}', 'KecamatanController@destroy')->name('delete-kecamatan');
Route::get('/kecamatan/json', 'KecamatanController@kecamatan');
Route::get('/kecamatan/lokasik/{kd_kecamatan}', 'KecamatanController@lokasik');


//Map
Route::get('map', 'TitikController@index');
Route::get('/titik/json', 'TitikController@titik');
Route::get('/titik/lokasi/{kd_kecamatan}', 'TitikController@lokasi');

//PUSKESMAP
Route::get('sebaran', 'TitikpuskesController@index');
Route::get('/puskes/json', 'TitikpuskesController@puskes');
Route::get('/puskes/lokasip/{id_puskes}', 'TitikpuskesController@lokasip');

//DESA MAP
Route::get('sebaran', 'TitikdesaController@index');
Route::get('/desa/json', 'TitikdesaController@desa');
Route::get('/desa/lokasid/{kd_desa}', 'TitikdesaController@lokasid');

//SEBARAN
Route::get('sebaran', 'SebaranController@index');
Route::get('/titik/json', 'SebaranController@titik');
Route::get('/titik/lokasi/{kd_kecamatan}', 'SebaranController@lokasi');
Route::get('/titik/data/{kd_kecamatan}', 'SebaranController@data');
Route::get('/sebaran-pertangal/{tglawal}/{tglakhir}/{fkecamatan}', 'SebaranController@sebaranpertanggal')->name('sebaran-pertanggal');


// Route::post('pravelensi', 'PravelensiController@laporan');
// Route::get('/pravelensi/{fkecamatan}', 'PravelensiController@sebaranpertanggal')->name('spravelensi');





// //laporan
// Route::get('laporan', 'LaporanController@index');
// Route::get('/penderitaexport', 'LaporanController@penderitaexport')->name('penderitaexport');
// Route::get('/penderitapdf', 'LaporanController@penderitapdf')->name('penderitapdf');
// Route::get('/data-pertangal/{tglawal}/{tglakhir}/{fkecamatan}', 'LaporanController@cetakpertanggal')->name('data-pertanggal');


//DATA PUSKESMAS
// Route::resource('/puskes', 'PuskesController');
Route::get('puskes', 'PuskesController@index');
Route::get('/puskes/create', 'PuskesController@create');
Route::post('/puskes', 'PuskesController@store');
Route::get('/ubahpuskes/{id_puskes}', 'PuskesController@edit')->name('edit-puskes');
Route::put('/puskes/update/{id_puskes}', 'PuskesController@update');
Route::get('/delete-puskes/{id_puskes}', 'PuskesController@destroy')->name('delete-puskes');

// MAP PUSKESMAS
// Route::get('tambahpuskes', 'PuskesController@create');
Route::get('/puskes/json', 'PuskesController@puskes');
Route::get('/puskes/lokasip/{id_puskes}', 'PuskesController@lokasip');



//BALITA
Route::get('balita', 'BalitaController@index');
Route::get('/balita/create', 'BalitaController@create');
Route::post('/balita', 'BalitaController@store');
Route::get('/ubahbalita/{id_balita}', 'BalitaController@edit')->name('edit-balita');
Route::get('/balita/{id_balita}', 'BalitaController@show')->name('detail-balita');
Route::put('/balita/update/{id_balita}', 'BalitaController@update');
Route::get('/delete-balita/{id_balita}', 'BalitaController@destroy')->name('delete-balita');
Route::get('/data-penderita', 'BalitaController@cetakall')->name('data-penderita');
Route::get('/data-penderita/{tglawal}/{tglakhir}', 'BalitaController@cetakpenderita')->name('data-penderita');

//INPUT PRAVELENSI
Route::get('inputpravelensi', 'InputpravelensiController@index');
Route::get('/inputpravelensi/create', 'InputpravelensiController@create');
Route::post('/inputpravelensi', 'InputpravelensiController@store');
Route::get('/ubahinputpravelensi/{id_pravelensi}', 'InputpravelensiController@edit')->name('edit-inputpravelensi');
Route::get('/ubahinputpravelensi/{id_pravelensi}', 'InputpravelensiController@show')->name('detail-inputpravelensi');
Route::put('/inputpravelensi/update/{id_pravelensi}', 'InputpravelensiController@update');
Route::get('/delete-inputpravelensi/{id_pravelensi}', 'InputpravelensiController@destroy')->name('delete-inputpravelensi');
Route::get('/filter-inputpravelensi/{tglawal}/{tglakhir}', 'InputpravelensiController@cetaklaporan')->name('filter-inputpravelensi');
Route::get('/filter-inputpravelensi', 'InputpravelensiController@laporanall')->name('filter-inputpravelensi');
// Route::get('/inputpravelensiexport/{filterkecamatan}', 'InputpravelensiController@inputpravelensiexport')->name('inputpravelensiexport');
Route::get('/inputpravelensiexport/{tglawal}/{tglakhir}', 'InputpravelensiController@inputpravelensiexport')->name('inputpravelensiexport');


//laporan
Route::get('laporan', 'LaporanController@index');
Route::get('/penderitaexport', 'LaporanController@penderitaexport')->name('penderitaexport');
// Route::get('/penderitaexport/{tglawal}/{tglakhir}', 'LaporanController@penderitaexport')->name('penderitaexport');
Route::get('/penderitapdf', 'LaporanController@penderitapdf')->name('penderitapdf');
Route::get('/cetakpertangal/{tglawal}/{tglakhir}', 'LaporanController@cetakpertanggal')->name('cetakpertanggal');
Route::get('/cetakpertangal/', 'LaporanController@cetakpertanggalall')->name('cetakpertanggal');
Route::get('/laporanpravelensiexport/{tglawal}/{tglakhir}', 'LaporanController@laporanpravelensiexport')->name('laporanpravelensiexport');




//Penderita
Route::get('penderita', 'LaporanstuntingController@index');
Route::get('/laporanexport', 'LaporanstuntingController@laporanexport')->name('laporanexport');
Route::get('/filter-laporan/{tglawal}/{tglakhir}', 'LaporanstuntingController@cetaklaporan')->name('filter-laporan');
Route::get('/filter-laporan', 'LaporanstuntingController@laporanall')->name('filter-laporan');




//Periode
Route::resource('/dataperiode', 'PeriodeController');
Route::get('dataperiode', 'PeriodeController@index');
Route::get('/dataperiode/create', 'PeriodeController@create');
Route::post('/dataperiode', 'PeriodeController@store');
Route::get('/ubahdataperiode/{id}', 'PeriodeController@edit')->name('edit-dataperiode');
Route::put('/dataperiode/update/{id}', 'PeriodeController@update');
Route::get('/delete-dataperiode/{id}', 'PeriodeController@destroy')->name('delete-dataperiode');


//Dpravelensi
Route::resource('/dpravelensi', 'DpravelensiController');
Route::get('dpravelensi', 'DpravelensiController@index');
Route::get('/dpravelensi/create', 'DpravelensiController@create');
Route::post('/dpravelensi', 'DpravelensiController@store');
Route::get('/ubahdpravelensi/{id}', 'DpravelensiController@edit')->name('edit-dpravelensi');
Route::put('/dpravelensi/update/{id}', 'DpravelensiController@update');
Route::get('/delete-dpravelensi/{id}', 'DpravelensiController@destroy')->name('delete-dpravelensi');

Route::get('/pravelensiexport', 'DpravelensiController@pravelensiexport')->name('pravelensiexport');
Route::get('/pravelensipdf', 'DpravelensiController@penderitapdf')->name('pravelensipdf');
Route::get('/filter-pertanggal/{tglawal}/{tglakhir}', 'DpravelensiController@filterpertanggal')->name('filter-pertanggal');

Route::get('/belajar', 'BelajarController@index');
Route::get('/getdesa', 'BelajarController@getDesa');


Route::resource('/pengguna', 'PenggunaController');
Route::get('/edit/{id}', 'PenggunaController@edit')->name('edit-pengguna');
Route::put('/pengguna/update/{id}', 'PenggunaController@update');
