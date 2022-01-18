<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth', 'as' => 'user.', 'namespace' => 'User'], function () {
    Route::redirect('/', '/home');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('albums')->group(function () {
        Route::get('/', 'AlbumController@index')->name('albums.index');
        Route::get('/create', 'AlbumController@create')->name('albums.create');
        Route::post('/create', 'AlbumController@store')->name('albums.store');
        Route::get('/{album}/edit', 'AlbumController@edit')->name('albums.edit');
        Route::post('/{album}/edit', 'AlbumController@update')->name('albums.update');
        Route::delete('/{album}', 'AlbumController@destroy')->name('albums.destroy');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@show')->name('profile.show');
        Route::post('/', 'ProfileController@update')->name('profile.update');
        Route::post('password', 'ProfileController@updatePassword')->name('profile.update.password');
    });
});
