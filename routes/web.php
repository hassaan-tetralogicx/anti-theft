<?php

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

//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth.shopify','billable'])->name('home');

Route::get('/', 'SettingController@index')->middleware(['auth.shopify','billable'])->name('home');
//Route::resource('settings', 'SettingController');
Route::post('/setting/{setting}', 'SettingController@activation')->middleware('auth.shopify')->name('setting.activation');
Route::get('/response.js', 'SettingController@response');

Route::get('/pricing-plans', 'SettingController@pricing')->middleware('auth.shopify');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth.shopify');
