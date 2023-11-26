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


    Route::get('/load/measurements', 'loadContent@measurements');
    Route::delete('/delete/measurements/{id}', 'loadContent@measurements_destroy');
    Route::post('/load/add_measurements', 'loadContent@add_measurements');


    // Web route
    Route::get('/measurements/{formatId}', 'loadContent@getMeasurementsByFormat');


    Route::get('/load/formats', 'loadContent@formatsview');
    Route::delete('/delete/format/{id}', 'loadContent@format_destroy');
    Route::post('/load/add_format', 'loadContent@add_format');



    Route::post('/save_associations_format', 'loadContent@saveAssociations');

//    Items

    Route::get('/load/items', 'loadContent@items');
    Route::delete('/delete/item/{id}', 'loadContent@item_destroy');
    Route::post('/load/add_items', 'loadContent@add_items');
    Route::get('/items/all/show', 'loadContent@item_all_show');



    Route::get('/load/item', 'loadContent@item');
    Route::get('/load/dash', 'loadContent@dash_view');
    Route::get('/load/add_order', 'loadContent@add_order')->name('add.order');
    Route::get('/load/add_purchase', 'loadContent@add_purchase');
    Route::get('/load/add_sell', 'loadContent@add_sell');
    Route::get('/load/expense', 'loadContent@expense');
    Route::get('/load/footer', 'loadContent@footer');
    Route::get('/load/order_list', 'loadContent@order_list');
//    customer add ajax
    Route::post('/add-customer', 'CustomerController@store');
//    show customer
    Route::get('/fetch-customers', 'loadContent@fetchCustomers');
    Route::get('/get-customer-details/{customerId}', 'loadContent@getCustomerDetails');

//    order form format details
    Route::get('/get-formats/order', 'loadContent@getFormatsForOrder');
    Route::get('/order/measurements/{formatId}', 'loadContent@getMeasurementsByFormatForOrder');


    Route::get('/load/receivable', 'loadContent@receivable');
    Route::get('/load/add_product', 'loadContent@add_product');
    Route::POST('/catagory/create', 'catagoryController@create');
    Route::delete('/delete/cat/{id}','catagoryController@destroy');
});
Route::post('/order/create', 'OrderController@create')->name('order.create');
Route::get('/try', 'incomeController@index');
Route::get('/orders/data', 'OrderController@getOrdersData')->name('orders.data');


