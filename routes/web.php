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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'ImagesController@index');

// ユーザ登録
Route::get ('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get ('login',  'Auth\LoginController@showLoginForm')->name('login');
Route::post('login',  'Auth\LoginController@login')->name('login.post');
Route::get ('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
    // ユーザ機能
    Route::get ('users/{id}/setting',  'UsersController@show')->name('user.setting');
    Route::put ('users/{id}/setting',  'UsersController@update')->name('user.update');

    // 画像機能
    Route::resource('image', 'ImagesController', ['only' => ['index', 'show', 'store', 'edit', 'update', 'destroy']]);
    Route::get('upload', 'ImagesController@create')->name('image.upload');

    Route::get('/about', 'AboutController@index')->name('about');
});