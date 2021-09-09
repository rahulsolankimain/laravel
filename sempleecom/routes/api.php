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

Route::get('countries','Country\CountryController@country');
Route::get('countries/{id}','Country\CountryController@countryById');
Route::post('countries','Country\CountryController@storecountry');
Route::put('countries/{id}','Country\CountryController@countryupdate');
Route::delete('countries/{id}','Country\CountryController@destroy');

Route::get('categories','CategoriesController@all');
