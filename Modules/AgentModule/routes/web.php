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

Route::group(['middleware' => ['admin'], 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('agent', 'AgentController');
    Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::any('data/status-update/{id}', 'AgentController@status_update')->name('status-update');
        Route::any('data/verification-update/{id}', 'AgentController@verification_update')->name('verification-update');
        Route::any('update-password/{id}', 'AgentController@update_password')->name('update-password');
        //location
        Route::resource('locations', 'LocationController');
        Route::group(['prefix' => 'locations', 'as' => 'locations.'], function () {
            Route::any('data/status-update/{id}', 'LocationController@status_update')->name('status-update');
        });
    });
});

