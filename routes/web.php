<?php


Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', 'CustomersController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

//delete customer
Route::get('/customers/delete/{id}', 'CustomersController@destroy') -> name('customers-delete');

// orders routes
Route::resource('orders', 'OrdersController')->except('show')->middleware('auth');

//delete order
Route::get('/orders/delete/{id}', 'ordersController@destroy') -> name('orders-delete');

Auth::routes();
