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

Route::get('/', function () {
    return redirect('/tickets');
});

Route::get('/tickets', 'TicketsController@index');

Route::get('/create/ticket', 'TicketsController@create');
Route::post('/create/ticket', 'TicketsController@store');

Route::get('/edit/ticket/{id}','TicketsController@edit');
Route::patch('/edit/ticket/{id}','TicketsController@update');

Route::delete('/delete/ticket/{id}', 'TicketsController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
