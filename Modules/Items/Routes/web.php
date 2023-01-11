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
Route::group(['prefix' => 'items', 'middleware' => ['auth']], function () {
    Route::get('/items', 'ItemsController@index')->name('Items');
    Route::get('/edit-item/{item_id}','ItemsController@editItem')->name('EditItem');
});
