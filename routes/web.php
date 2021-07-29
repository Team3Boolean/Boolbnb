<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */


// HOMEPAGE
Route::get('/', 'HomeController@index')->name('home.index');
// rotta per show singolo appartamento
Route::get('/apartments/{id}', 'ApartmentController@show')->name('apartments.show');
// per compilare form messaggio
//Route::resource('/messages', 'MessageController',
//               ['only' => ['store']]);
Route::post('/messages', 'MessageController@store')->name('messages.store');
Auth::routes();

// rotte admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
    // Route::get('/', 'HomeController@index')->name('index');
    // Route::get('/users', 'UserController@index')->name('users.index');

    Route::get('/', 'HomeController@index')->name('index');

    // inseriamo la rotta per gli apartments degli admin con il resource che prenderà tutte le rotte della crud
    Route::resource('/apartments', 'ApartmentController');


    //rotta per messaggi da integrare a dashboard
    Route::resource('/messages', 'MessageController');    

    //rotta per sponnsorizzazioni
    Route::get('/apartments/{id}/sponsorships/payment', 'SponsorshipControlle@payment');
});