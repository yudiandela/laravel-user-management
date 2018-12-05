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

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'MainController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::name('admin.')->group(function () {
            Route::resource('user', 'UserController')->except('show');
            Route::get('user/{user}/activation', 'UserController@userActivation')->name('user.activation');
        });
    });
});
