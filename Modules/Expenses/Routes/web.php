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

Route::prefix('expenses')->group(function() {
    Route::get('/expenses', 'ExpensesController@index')->name('Expenses');
    Route::get('/edit-expenses/{expenses_id}', 'ExpensesController@editExpenses')->name('EditExpenses');
});
