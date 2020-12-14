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
    // return view('welcome');r
    return redirect()->route('pay');
});
// Route::get('/', 'PaymentController@index');
Route::get('payment', 'PaymentController@pay')->name('pay');
Route::get('payment/finish', 'PaymentController@finish');
// Route::get('payment', 'PaymentController@index');
// Route::get('payment/finish', 'PaymentController');
// Route::get('payment/unfinish', 'PaymentController');
// Route::get('payment/error', 'PaymentController');
// // Route::resource('payment/','PaymentWebhookController');
// Route::get('payment/notification', 'PaymentWebhookController');

//dibawah ini yang bisa
// Route::get('/', 'OrderController@index');
// Route::post('notification', 'Payment2Controller@notification');
// Route::get('finish', 'Payment2Controller@finish');
// Route::get('unfinish', 'Payment2Controller@unfinish');
// Route::get('error', 'Payment2Controller@unfinish');

//contoh sesuai dengan studi case yang sedang dialami
Route::group(['namespace' => 'Payment'], function () {
    Route::get('/', 'JoinController@index');
});
