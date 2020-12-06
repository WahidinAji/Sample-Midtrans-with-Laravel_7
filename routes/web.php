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

Route::get('/', function () {
    return view('welcome');
});
Route::get('payment', 'PaymentController@index');
Route::get('payment/finish', 'PaymentController');
Route::get('payment/unfinish', 'PaymentController');
Route::get('payment/error', 'PaymentController');
// Route::resource('payment/','PaymentWebhookController');
Route::get('payment/notification', 'PaymentWebhookController');
