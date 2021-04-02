<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', 'CustomersController')->except('show')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

//delete customer
Route::get('/customers/delete/{id}', 'CustomersController@destroy') -> name('customers-delete');

Auth::routes();
