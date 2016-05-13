<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'Auth'], function(){
  Route::get('login', 'AuthController@showLoginForm');
  Route::post('login', 'AuthController@login');
  Route::get('logout', 'AuthController@logout');
});

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index');
  Route::get('download', ['as' => 'download', 'uses' => 'InventarisController@index']);
  Route::get('print', ['as' => 'print', 'uses' => 'InventarisController@index']);

  Route::group(['middleware' => 'ajaxonly'], function(){
    Route::get('dashboard', 'HomeController@dashboard');
    Route::get('profil', ['as' => 'profil', 'uses' => 'HomeController@profil']);
    Route::resource('pengguna', 'UserController', ['except' => ['index', 'show']]);
    Route::post('upload', ['as' => 'avatar.upload', 'uses' => 'UserController@fileUpload']);

    Route::get('asset', ['as' => 'inventaris.index', 'uses' => 'InventarisController@index']);
    Route::post('asset', ['as' => 'inventaris.filter', 'uses' => 'InventarisController@index']);
    Route::get('asset/baru', ['as' => 'inventaris.baru', 'uses' => 'InventarisController@create']);
    Route::post('asset/baru', ['as' => 'inventaris.simpan', 'uses' => 'InventarisController@store']);
    Route::get('asset/edit/{id}', ['as' => 'inventaris.edit', 'uses' => 'InventarisController@edit']);
    Route::get('asset/{id}', ['as' => 'inventaris.detail', 'uses' => 'InventarisController@show']);
    Route::patch('asset/{id}', ['as' => 'inventaris.update', 'uses' => 'InventarisController@update']);
    Route::delete('asset/{id}', ['as' => 'inventaris.hapus', 'uses' => 'InventarisController@destroy']);

    Route::post('autocomplete', ['as' => 'autocomplete', 'uses' => 'InventarisController@autocomplete']);
    Route::post('listkat', ['as' => 'listkategori', 'uses' => 'InventarisController@listkategori']);
  });
});
