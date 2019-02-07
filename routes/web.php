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
Route::get('/chat', 'ChatController@index')->name('chat');

Route::get('/message', 'MessageController@index')->name('message');
Route::post('/message','MessageController@store')->name('message.store');

//route användarvillkor
Route::get('/agreement', 'AgreementController@index')->name('agreement');

//route about
Route::get('/about', 'AboutController@index')->name('about');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
