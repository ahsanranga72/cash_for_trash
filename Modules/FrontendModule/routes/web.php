<?php

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
