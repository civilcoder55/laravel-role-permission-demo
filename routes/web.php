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

    Route::resource('albums', 'AlbumController');


    Route::prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@show')->name('profile.show');
        Route::post('/', 'ProfileController@update')->name('profile.update');
        Route::post('password', 'ProfileController@updatePassword')->name('profile.update.password');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','permission:admin-access'], 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::redirect('/', '/admin/dashboard');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    Route::resource('users', 'UserController', ['except' => ['show']]);
    Route::resource('roles', 'RoleController', ['except' => ['show']]);
    Route::resource('albums', 'AlbumController', ['except' => ['create', 'store', 'show']]);
});
