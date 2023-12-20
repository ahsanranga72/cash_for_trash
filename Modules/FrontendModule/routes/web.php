<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Modules\FrontendModule\app\Http\Controllers\FrontendModuleController;

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
    return view('frontendmodule::home');
})->name('home');

Route::get('contact-us', function () {
    return view('frontendmodule::contact-us');
})->name('contact-us');

Route::get('about-us', function () {
    return view('frontendmodule::about-us');
})->name('about-us');

Route::get('products/rate', 'FrontendModuleController@products_rate')->name('products.rate');
//customer
Route::group(['namespace' => 'Customer', 'prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login_form')->name('login');
        Route::post('login', 'LoginController@submit')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::post('registration', 'RegistrationController@registration')->name('registration');
    });
    Route::group(['middleware' => 'customer'], function () {
        Route::resource('addresses', 'AddressController');
        Route::get('sell-request/{product_id}', 'OrderController@sell_request')->name('sell-request');
        Route::post('order-submit', 'OrderController@order_submit')->name('order-submit');
        Route::get('dashboard/{slug}', 'DashboardController@dashboard')->name('dashboard');
        Route::put('profile-update', 'ProfileController@profile_update')->name('profile-update');
    });
});
//agent
Route::group(['namespace' => 'Agent', 'prefix' => 'agent', 'as' => 'agent.'], function () {
    Route::get('request-form', 'AgentController@request_form')->name('request-form');
    Route::post('request-form-submit', 'AgentController@request_form_submit')->name('request-form-submit');
});
