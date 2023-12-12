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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['admin'], 'prefix' => 'agent', 'as' => 'agent.'], function () {
        Route::resource('locations', 'LocationController');
        Route::group(['prefix' => 'locations', 'as' => 'locations.'], function () {
            Route::any('data/status-update/{id}', 'LocationController@status_update')->name('status-update');
        });
    });
});

