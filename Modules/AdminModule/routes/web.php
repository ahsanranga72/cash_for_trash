<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminModule\app\Http\Controllers\AdminModuleController;

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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    /*auth*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        //products
        Route::resource('products', 'ProductController')->except('show');
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::any('data/status-update/{id}', 'ProductController@status_update')->name('status-update');
            //category
            Route::resource('category', 'CategoryController')->except('show');
            Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
                Route::any('data/status-update/{id}', 'CategoryController@status_update')->name('status-update');
            });
        });
    });
});
