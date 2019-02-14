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
    return redirect('kwitansi');
});

Route::get('kwitansi', ['as' => 'kwitansi.index', 'uses' => 'MainController@kwitansi']);
Route::get('invoice', ['as' => 'invoice.index', 'uses' => 'MainController@invoice']);
