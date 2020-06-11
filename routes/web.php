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

Route::group(['middleware' => 'admin'], function()
{
    Route::get('/users', 'UsersController@index');
    Route::get('/edit/{user}', 'UsersController@editUser');
    Route::put('/update/{id}', 'UsersController@updateUser');
    Route::delete('/delete/{id}', 'UsersController@deleteUser');
});

Route::get('/home', 'HomeController@index')->name('home');
