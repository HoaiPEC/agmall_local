<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'localization'], function() {
    Route::get('lang/{locale}', 'Admins\AdminController@switchLanguage')->name('lang');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admins', 'as' => 'admin.', 'middleware' => 'Logged'], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::get('dashboard-sale', 'AdminController@dashboardSale')->name('dashboard_sale');
    Route::resource('sale-directors', 'UserController');
    Route::get('change-status', 'UserController@changeStatus');
});

Auth::routes();

Route::group(['namespace' => 'Auth', 'as' => 'admin.'], function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('login', 'LoginController@getLogin')->name('login');
    Route::post('login', 'LoginController@login')->name('post_login');
});
