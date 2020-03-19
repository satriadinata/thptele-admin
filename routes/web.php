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

Auth::routes(['register'=>false]);
Route::middleware('auth')->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/keyset', 'ReplyController@keyset')->name('keyset');
Route::get('/tambahkey', 'ReplyController@tambahkey')->name('tambahkey');
Route::post('/addkeyup', 'ReplyController@addkeyup')->name('addkeyup');
Route::get('/hapuskey/{id}', 'ReplyController@hapuskey')->name('hapuskey');
Route::get('/editkey/{id}', 'ReplyController@editkey')->name('editkey');
Route::post('/upedit/{id}', 'ReplyController@upedit')->name('upedit');
Route::get('/hapuspesan/{id}', 'MessageController@hapuspesan')->name('hapuspesan');
Route::post('/srcmsg', 'MessageController@srcmsg')->name('srcmsg');
Route::get('/reply/{id}', 'ReplyController@reply')->name('reply');
Route::post('/replySend', 'ReplyController@replySend')->name('replySend');
Route::get('/delpsn/{id}', 'MessageController@delpsn')->name('delpsn');
Route::get('/sentbox', 'SentController@sentbox')->name('sentbox');
Route::post('/srcsent', 'SentController@srcsent')->name('srcsent');
Route::get('/delsent/{id}', 'SentController@delsent')->name('delsent');
Route::get('/hapussent/{id}', 'SentController@hapussent')->name('hapussent');
Route::get('/msg', 'HomeController@msg')->name('msg');
});
