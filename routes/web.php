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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('yotei/create', 'Admin\YoteiController@add');
    Route::post('yotei/create', 'Admin\YoteiController@create');
    Route::get('yotei', 'Admin\YoteiController@index');
    Route::get('yotei/edit', 'Admin\YoteiController@edit');
    Route::post('yotei/edit', 'Admin\YoteiController@update');
    Route::get('yotei/delete', 'Admin\YoteiController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
