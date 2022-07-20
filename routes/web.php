<?php

// Rotte per l'autenticazione (register, login, logout)
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Rotta per la homepage pubblica
Route::get('/home', 'HomeController@index')->name('home');

// Rotte per i clienti
Route::resource('customers', 'CustomersController')->except('show')->middleware('auth');

// Rotte per gli ordini
Route::resource('orders', 'OrdersController')->except('show')->middleware('auth');

// Rotte per i contratti
Route::get('contracts', 'ContractsController@index')->name('contracts.index')->middleware('auth');




