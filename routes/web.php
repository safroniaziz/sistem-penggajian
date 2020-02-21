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

Route::get('/', function () {
    return view('login');
})->name('login-admin');

Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

Route::group(['prefix'	=>	'admin/'], function(){
	Route::get('','DashboardController@index')->name('admin.dashboard');
	Route::get('/laporan','LaporanController@laporan')->name('admin.laporan');
	Route::get('/api_laporan','LaporanController@apiLaporan')->name('api.laporan');
	Route::get('print_detail/{nipy}','LaporanController@printDetail')->name('print_detail');
});

Route::group(['prefix'	=>	'admin/pegawai'],function(){
	Route::get('','PegawaiController@index')->name('admin.pegawai');
	Route::post('/','PegawaiController@store');
	Route::patch('/{nipy}','PegawaiController@update');
	Route::delete('/{nipy}','PegawaiController@destroy');
	Route::get('/{nipy}/edit','PegawaiController@edit');
	Route::get('/api_pegawai','PegawaiController@apiPegawai')->name('api.pegawai');
});

Route::group(['prefix'	=>	'admin/jabatan'],function(){
	Route::get('','JabatanController@index')->name('admin.jabatan');
	Route::post('/','JabatanController@store');
	Route::patch('/{id_jabatan}','JabatanController@update');
	Route::delete('/{id_jabatan}','JabatanController@destroy');
	Route::get('/{id_jabatan}/edit','JabatanController@edit');
	Route::get('/api_jabatan','JabatanController@apiJabatan')->name('api.jabatan');
});