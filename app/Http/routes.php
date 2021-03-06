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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

//用户注册
Route::get('/signup', 'UsersController@create')->name('signup');
//确认邮件
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

//用户操作
resource('users', 'UsersController');

//登陆-退出
Route::get('login', 'SessionController@create')->name('login');
Route::post('login', 'SessionController@store')->name('store');
Route::delete('logout', 'SessionController@destroy')->name('logout');

//密码重置
get('password/email', 'Auth\PasswordController@getEmail')->name('password.reset');
post('password/email', 'Auth\PasswordController@postEmail')->name('password.reset');
get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password.edit');
post('password/reset', 'Auth\PasswordController@postReset')->name('password.update');

//微博CD
resource('statuses', 'StatusesController', ['only'=>['destroy', 'store']]);