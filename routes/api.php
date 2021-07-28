<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('apartments','Api\\ApartmentController');
Route::apiResource('messages','Api\\MessageController');


//Route::get("/apartments", "Api\ApartmentController@index");
//Route::get("/apartments/filter" , "Api\ApartmentController@filter");

// creo rotta per generazione(get) token e per invio pagamento(post)
Route::get('payment/generate', 'Api\PaymentController@generateToken');
Route::post('payment/make', 'Api\PaymentController@makePayment');

Route::get('sponsorships', 'Api\SponsorshipController@index');