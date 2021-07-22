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

Auth::routes();

// rotte admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/users', 'UserController@index')->name('users.index');
    });
