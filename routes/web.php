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

Route::get('/', 'MainController@index')->name('index');

Auth::routes(/* ['register' => false] */);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::name('admin.')->group(function () {
            Route::resource('user', 'UserController')->except('show');
            Route::get('user/{user}/activation', 'UserController@userActivation')->name('user.activation');
            Route::get('user/trash', 'UserController@trash')->name('user.trash');
            Route::get('user/{id}/force', 'UserController@forceDelete')->name('user.forceDelete');
            Route::get('user/{id}/restore', 'UserController@restore')->name('user.restore');
        });
    });
});
