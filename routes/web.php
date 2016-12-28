<?php

use Illuminate\Support\Facades\Auth;

Route::get('users/{username}', 'ApiController@gitData');

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/product', 'ProductController@index');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('home', 'AdminController@index');
    Route::get('admin/job-approve/{id}', 'AdminController@approve');

    // DataTables
    Route::get('dataTablesProducts', 'Admin\DataTableController@getProducts');

    // Products
    Route::get('products', 'Admin\ProductController@index');
    Route::get('product/create', 'Admin\ProductController@create');
    Route::post('products', 'Admin\ProductController@store');
    Route::get('product/{product}/edit', 'Admin\ProductController@edit');
    Route::post('product/{product}', 'Admin\ProductController@update');
    Route::get('product/{product}', 'Admin\ProductController@show');
    Route::get('product/{product}/delete', 'Admin\ProductController@destroy');

    Route::post('product-image-upload/{product}', 'Admin\ProductController@productImage');
    Route::post('delete-product-image/{product}', 'Admin\ProductController@deleteImage');

});
