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


Route::post('/', 'Otentikasi\OtentikasiController@login')->name('login');
Route::get('/', 'Otentikasi\OtentikasiController@index')->name('login');
Route::get('/logout', 'Otentikasi\OtentikasiController@logout')->name('logout');

// Route::group(['middleware' => 'CekLoginMiddleware'], function(){
Route::group(['middleware' => 'auth'], function(){
	Route::view('/dashboard', 'index');
	Route::get('/crud', 'CrudController@index')->name('crud');
	Route::get('/crud/tambah', 'CrudController@tambah');
	Route::post('/crud/simpan', 'CrudController@simpan');
	Route::delete('/crud/delete/{id}', 'CrudController@delete')->name('crud.delete');
	Route::get('/crud/{id}/edit', 'CrudController@edit')->name('crud.edit');
	Route::patch('/crud/{id}', 'CrudController@update')->name('crud.update');

});

