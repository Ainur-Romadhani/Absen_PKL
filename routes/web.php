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

// Route::get('/', function () {
//     return view('admin/dashboard');
// });

Route::group(['middleware' => ['auth','checkRole:admin,sekolah,magang']],function(){
Route::get('/', function () {
    return view('404');
});
});



Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin,sekolah,magang']],function(){
    // Route::get('/dashboard','DashboardController@index');
    // Route::post('/dashboard/update','DashboardController@update');
    Route::resource('dashboard','DashboardController');
    
    
});

Route::group(['middleware' => ['auth','checkRole:admin']],function(){
    Route::resource('DataKelas','KelasController');
    // //Jurusan
    // Route::get('DataKelas','KelasController@index');
    // Route::patch('DataKelas','KelasController@edit');

    Route::resource('DataUser','PembimbingController');
    Route::resource('DataSiswa','SiswaController');
    Route::post('DataSiswa/tambah','SiswaController@tambah');
    // Route::post('DataSiswa/print/{id}', 'SiswaController@qrcode' );

});

Route::group(['middleware' => ['auth','checkRole:magang,admin']],function(){
    Route::resource('SiswaMagang', 'AbsensiMagangController');
    
});

Route::group(['middleware' => ['auth','checkRole:sekolah,admin']],function(){
    Route::resource('AbsenSiswaMagang', 'AbsensiSekolahController');
});