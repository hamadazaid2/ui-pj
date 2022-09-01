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

// Route::get('/video', function () {
//     return view('video');
// });

Route::group(['prefix' => 'videos'], function () {
    Route::get('show/{id}', 'App\Http\Controllers\Video\VideoController@show')->name('video.show');
    Route::get('all', 'App\Http\Controllers\Video\VideoController@index')->name('video.all');
    Route::get('create', 'App\Http\Controllers\Video\VideoController@create')->name('video.create');
    Route::post('store', 'App\Http\Controllers\Video\VideoController@store')->name('video.store');
    Route::get('edit/{id}', 'App\Http\Controllers\Video\VideoController@edit')->name('video.edit');
    Route::post('update/{id}', 'App\Http\Controllers\Video\VideoController@update')->name('video.update');

    // Route::post();

});

Route::get('/   ', function () {
    return view('website.layout.layout');
})->name('site')->middleware('verified');

Route::get('/site', function () {
    return view('website.layout.layout');
})->name('site')->middleware('verified');
// Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['LocaleSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
Route::group(['prefix' => 'offers'], function () {
    Route::get('/all', 'App\Http\Controllers\OfferTestController@getOffers')->name('offer.all');
    // Route::get('store', 'App\Http\Controllers\OfferTestController@store');
    Route::get('create', 'App\Http\Controllers\OfferTestController@create')->name('offer.create');
    Route::post('store', 'App\Http\Controllers\OfferTestController@store')->name('offer.store');
    Route::get('edit/{id}', 'App\Http\Controllers\OfferTestController@edit')->name('offer.edit');
    Route::post('update/{id}', 'App\Http\Controllers\OfferTestController@update')->name('offer.update');
    Route::get('delete/{id}', 'App\Http\Controllers\OfferTestController@delete')->name('offer.delete');
});
// });
Route::get('/offers', 'App\Http\Controllers\OfferTestController@getOffers');



//AUTH ROUTES

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

###################### START AJAX ######################


Route::group(['prefix' => 'ajax-offer'], function () {
    Route::get('all', 'App\Http\Controllers\Ajax\OfferController@index')->name('ajax.offer.all');
    Route::get('create', 'App\Http\Controllers\Ajax\OfferController@create')->name('ajax.offer.create');
    Route::post('store', 'App\Http\Controllers\Ajax\OfferController@store')->name('ajax.offer.store');
    Route::post('delete', 'App\Http\Controllers\Ajax\OfferController@delete')->name('ajax.offer.delete');
    Route::get('edit/{id}', 'App\Http\Controllers\Ajax\OfferController@edit')->name('ajax.offer.edit');
    Route::post('update', 'App\Http\Controllers\Ajax\OfferController@update')->name('ajax.offer.update');
});

###################### START AJAX ######################


###################### START AUTHIENTICATION ######################
// Route::group(['prefix'=>'auth'], function(){
//     Route::get('adult', 'App\Http\Controllers\Auth\CustomAuth@adult') -> middleware('checkAgeMiddleware');
// });
###################### END AUTHIENTICATION ######################
