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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('request','RequestController@getrequest');
Route::POST('addrequest','RequestController@addreq');
Route::get('add_request','RequestController@getform');

Route::POST('edit','RequestController@edit');
Route::get('request_edit{id}','RequestController@editrequest');
Route::get('request_delete{id}','RequestController@delete_req');
//Route::get('showrequest','RequestController@show_req');


