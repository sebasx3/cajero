<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//para hacer el update
Route::post('/customers/{customer}/update', 'CustomersController@update');
//--------------------
//
//para borrar archivo y el get es para traer la informacion, pero en este caso es mejor el delete
Route::DELETE('/customers/{id}/delete', 'CustomersController@destroy');
//--------------------
Route::resource('/customers', 'CustomersController');

//----------------------------------------------------------
//aqui sigue transactions
//----------------------------------------------------------

Route::resource('/transactions', 'TransactionsController');
//para hacer el update
Route::post('/transactions/{transaction}/update', 'TransactionsController@update');
//para borrar
Route::DELETE('/transactions/{id}/delete', 'TransactionsController@destroy');
