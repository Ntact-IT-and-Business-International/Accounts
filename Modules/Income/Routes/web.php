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
Route::group(['prefix' => 'income', 'middleware' => ['auth']], function () {
    Route::get('/income', 'IncomeController@index')->name('Income');
    Route::get('/edit-income/{income_id}', 'IncomeController@editIncome')->name('EditIncome');
});
