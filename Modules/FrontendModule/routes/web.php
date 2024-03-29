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
        Route::get('otp', 'OtpController@otp')->name('otp');
        Route::post('verify-otp', 'OtpController@verify_otp')->name('verify-otp');
        Route::get('forget-password', 'LoginController@forget_password')->name('forget-password');
        Route::post('forgot-email-submit', 'LoginController@forgot_email_submit')->name('forgot-email-submit');
        Route::get('forgot-otp', 'LoginController@forgot_otp')->name('forgot-otp');
        Route::post('forgot-otp-verify', 'LoginController@forgot_otp_verify')->name('forgot-otp-verify');
        Route::get('password-reset', 'LoginController@password_reset')->name('password-reset');
        Route::post('password-reset', 'LoginController@password_reset_submit')->name('password-reset');
    });
    Route::group(['middleware' => 'customer'], function () {
        Route::resource('addresses', 'AddressController');
        //add to cart
        Route::post('add-to-cart', 'OrderController@add_to_cart')->name('add-to-cart');
        Route::post('remove-from-cart', 'OrderController@remove_from_cart')->name('remove-from-cart');
        Route::post('product-add-to-cart', 'OrderController@product_add_to_cart')->name('product-add-to-cart');
        Route::get('product-remove-from-cart/{id}', 'OrderController@product_remove_from_cart')->name('product-remove-from-cart');
        //order
        Route::get('sell-request', 'OrderController@sell_request')->name('sell-request');
        Route::post('order-submit', 'OrderController@order_submit')->name('order-submit');
        Route::post('order-add-note/{id}', 'OrderController@order_add_note')->name('order-add-note');
        Route::get('order-details/{id}', 'OrderController@order_details')->name('order-details');
        Route::get('order-edit/{id}', 'OrderController@order_edit')->name('order-edit');
        Route::post('order-update/{id}', 'OrderController@order_update')->name('order-update');
        Route::get('order-delete/{id}', 'OrderController@order_delete')->name('order-delete');
        Route::get('dashboard/{slug}', 'DashboardController@dashboard')->name('dashboard');
        Route::put('profile-update', 'ProfileController@profile_update')->name('profile-update');
    });
});
//agent
Route::group(['namespace' => 'Agent', 'prefix' => 'agent', 'as' => 'agent.'], function () {
    Route::get('request-form', 'AgentController@request_form')->name('request-form');
    Route::post('request-form-submit', 'AgentController@request_form_submit')->name('request-form-submit');
});
