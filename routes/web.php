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
    return view('welcom');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    //yotei
    Route::get('yotei/create', 'Admin\YoteiController@add');
    Route::post('yotei/create', 'Admin\YoteiController@create')->name('yotei/create');
    Route::get('yotei', 'Admin\YoteiController@index')->name('yotei');
    Route::get('yotei/edit', 'Admin\YoteiController@edit');
    Route::post('yotei/edit', 'Admin\YoteiController@update');
    Route::get('yotei/delete', 'Admin\YoteiController@delete');
    //jisseki
    Route::get('jisseki/create', 'Admin\JissekiController@add');
    Route::post('jisseki/create', 'Admin\JissekiController@create');
    Route::get('jisseki', 'Admin\JissekiController@index')->name('jisseki');
    Route::get('jisseki/show', 'Admin\JissekiController@show');
    Route::get('jisseki/edit', 'Admin\JissekiController@edit');
    Route::post('jisseki/edit', 'Admin\JissekiController@update');
    Route::get('jisseki/delete', 'Admin\JissekiController@delete');
    //analysis
    Route::get('analysis', 'Admin\AnalysisController@index')->name('yoteijisseki');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/top', 'TopController@index')->name('top');