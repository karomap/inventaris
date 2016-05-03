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

Route::auth();

Route::group(['middleware' => 'auth'], function() {
  Route::get('/', 'HomeController@index');

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
