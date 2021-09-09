<?php

use App\Subcategory;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoriesController');

Route::resource('subcategories','SubCategoryController');
//clientid 175716008407-c11psl8lf9le7k17gef2eisp9ftoiagt.apps.googleusercontent.com
//secret id y-qpAxBtyNoR99f43UKA08jh
Route::get('/google-login', 'SocialAuthGoogleController@redirectToProvider');
Route::get('/call-back', 'SocialAuthGoogleController@handleProviderCallback');
