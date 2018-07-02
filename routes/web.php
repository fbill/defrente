<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/', function () {
    return view('webPublic.inicio');
});*/
Route::get('/', 'InicioController@home')->name('inicio');
Route::get('/detailEvent/{slug?}', 'InicioController@detailEvent')->name('detailEvent');
Route::post('/eventPreviousBuy', 'InicioController@previousBuy')->name('previousBuy');
Route::post('/purchasedComplete', 'InicioController@purchasedComplete')->name('purchasedComplete');
Route::post('/generateOrders', 'InicioController@generateOrder')->name('generateOrders');
Route::get('/endProcess', 'InicioController@endProcess')->name('endProcess');
Route::post('/verifyOrder', 'InicioController@verifyOrder')->name('verifyOrder');
Route::get('/searchEvents', 'InicioController@searchEvents')->name('searchEvents');
Route::get('/info/{type}', 'InicioController@info')->name('info');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
