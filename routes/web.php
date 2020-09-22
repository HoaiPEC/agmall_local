<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'Admins', 'as' => 'admin.', 'middleware' => 'isAdmin'], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
});

Auth::routes();

Route::group(['namespace' => 'Auth', 'as' => 'admin.'], function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('login', 'LoginController@getLogin')->name('login');
});
