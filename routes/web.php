<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::get('/test', function () {
    return 'name_' . LaravelLocalization::getCurrentLocale() . ' as name';
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/site', function () {
    return view('website.layout.layout');
});
// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['LocaleSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'offers'], function () {
        Route::get('/all', 'App\Http\Controllers\OfferTestController@getOffers')->name('offer.all');
        // Route::get('store', 'App\Http\Controllers\OfferTestController@store');
        Route::get('create', 'App\Http\Controllers\OfferTestController@create');
        Route::post('store', 'App\Http\Controllers\OfferTestController@store')->name('offer.store');
        Route::get('edit/{id}', 'App\Http\Controllers\OfferTestController@edit')->name('offer.edit');
        Route::post('update/{id}', 'App\Http\Controllers\OfferTestController@update')->name('offer.update');
    });
// });
Route::get('/offers', 'App\Http\Controllers\OfferTestController@getOffers');



//AUTH ROUTES

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
