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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('crud', [
  'uses'  =>  'HomeController@crud',
  'as'    =>  'crud',
]);
Route::post('crud/store', [
  'uses'  =>  'HomeController@store',
  'as'    =>  'crud.store',
]);
Route::get('crud/edit/{id}', [
  'uses'  =>  'HomeController@edit',
  'as'    =>  'crud.edit',
]);
Route::post('crud/update/{id}', [
  'uses'  =>  'HomeController@update',
  'as'    =>  'crud.update',
]);
Route::post('crud/delete/{id}', [
  'uses'  =>  'HomeController@destroy',
  'as'    =>  'crud.delete',
]);
