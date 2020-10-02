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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


//Load Content Ajax


//Route::get('/load', 'loadContent@index')->middleware('Auth');
//Route::get('/load/dash', 'loadContent@dash_view')->middleware('Auth');
//Route::get('/load/add_order', 'loadContent@add_order');
//Route::get('/load/add_purchase', 'loadContent@add_purchase');
//Route::get('/load/add_sell', 'loadContent@add_sell');
//Route::get('/load/expense', 'loadContent@expense');
//Route::get('/load/footer', 'loadContent@footer');
//Route::get('/load/order_list', 'loadContent@order_list');
//Route::get('/load/receivable', 'loadContent@receivable');
//Route::get('/load/add_product', 'loadContent@add_product');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/load', 'loadContent@index')->name('load');
    Route::get('/load/dash', 'loadContent@dash_view');
    Route::get('/load/add_order', 'loadContent@add_order');
    Route::get('/load/add_purchase', 'loadContent@add_purchase');
    Route::get('/load/add_sell', 'loadContent@add_sell');
    Route::get('/load/expense', 'loadContent@expense');
    Route::get('/load/footer', 'loadContent@footer');
    Route::get('/load/order_list', 'loadContent@order_list');
    Route::get('/load/receivable', 'loadContent@receivable');
    Route::get('/load/add_product', 'loadContent@add_product');
    Route::POST('/catagory/create', 'catagoryController@create');
    Route::delete('/delete/cat/{id}','catagoryController@destroy');
});
Route::post('/order/create', 'orderController@create');
Route::get('/try', 'incomeController@index');

