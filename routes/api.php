<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group(['prefix' => 'siswa','middleware' => ['assign.guard:siswa','jwt.auth']],function ()
// {
    // Route::get('/demo','AdminController@demo');

    Route ::prefix('/siswa')->group(function(){
        Route::post('/login','Api/LoginController@login');
    });
   
//LoginAPP
Route::post('datasiswa','Api\SiswaController@datasiswa');
 Route::post('loginsiswa','Api\SiswaController@login');

//Absen
Route::post('hadir','Api\AbsenController@absenhadir');
Route::post('izinsakit','Api\AbsenController@absenizinsakit');
Route::get('history/{id}/{siswa}','Api\AbsenController@history');
