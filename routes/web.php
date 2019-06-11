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

Route::get('/', 'Cliente\ClienteController@index')->name('cliente.index');

Route::group(['prefix' => 'cliente'], function(){
    Route::get('/insert', 'Cliente\ClienteController@showViewInsert')->name('cliente.insert');
    Route::get('/show/{id}', 'Cliente\ClienteController@showCliente')->name('cliente.show');
    Route::post('/show/update', 'Cliente\ClienteController@updateCliente')->name('cliente.update');
    Route::post('/insert/save', 'Cliente\ClienteController@save')->name('cliente.save');
});
