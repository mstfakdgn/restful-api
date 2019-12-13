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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/my-tokens', 'HomeController@getAuthorizedClients')->name('personal-authorized-clients');
Route::get('/home/authorized-clients', 'HomeController@getClients')->name('personal-clients');
Route::get('/home/clients', 'HomeController@getTokens')->name('personal-tokens');
