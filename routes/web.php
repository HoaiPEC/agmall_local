<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'namespace' => 'Admins', 'as' => 'admin.'], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
});
