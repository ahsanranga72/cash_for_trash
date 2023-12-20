<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Modules\AgentModule\app\Http\Controllers\AgentModuleController;

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
//agent
Route::group(['namespace' => 'Agent', 'prefix' => 'agent', 'as' => 'agent.'], function () {
    /*auth*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['middleware' => ['agent']], function () {
        Route::get('/', 'AgentController@index')->name('dashboard');
        //orders
        Route::get('orders/{status}', 'OrderController@list')->name('orders');
        Route::get('order-show/{id}', 'OrderController@show')->name('order-show');
        Route::post('order-status-change/{id}', 'OrderController@status_change')->name('order-status-change');
    });
});
//admin
Route::group(['middleware' => ['admin'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('agent', 'AgentController')->except('show');
    Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::any('data/status-update/{id}', 'AgentController@status_update')->name('status-update');
        Route::any('data/verification-update/{id}', 'AgentController@verification_update')->name('verification-update');
        Route::any('update-password/{id}', 'AgentController@update_password')->name('update-password');
        //location
        Route::resource('locations', 'LocationController')->except('show');
        Route::group(['prefix' => 'locations', 'as' => 'locations.'], function () {
            Route::any('data/status-update/{id}', 'LocationController@status_update')->name('status-update');
        });
    });
});
