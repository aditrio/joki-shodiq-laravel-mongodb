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

Route::get('/', 'DashController@index');
Route::get('/mahasiswa', 'DashController@mahasiswa');
Route::get('/nilai', 'DashController@nilai');


Route::get('/test'  , 'TestController@index');
Route::post('/test/post'  , 'TestController@store')->name('store.test');
Route::put('/test/{id}/update'  , 'TestController@update')->name('update.test');
Route::delete('/test/{id}/delete'  , 'TestController@destroy')->name('destroy.test');



Route::post('/mhs/post'  , 'MahasiswaController@store')->name('store.mhs');
Route::put('/mhs/{id}/update'  , 'MahasiswaController@update')->name('update.mhs');
Route::delete('/mhs/{id}/delete'  , 'MahasiswaController@destroy')->name('destroy.mhs');
