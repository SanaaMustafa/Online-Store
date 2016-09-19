<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Routes

Auth::routes();
Route::get('/ShopME' ,         ['as'=>'ShopME.index','uses'=>'ProductController@index']);
Route::post('/ShopME/store',   ['as'=>'ShopME.store','uses'=>'ProductController@store']);
Route::get('ShopME/{id}',      ['as' => 'ShopME.show', 'uses' => 'ProductController@show']);
Route::get('logout',           [                       'uses' => 'ProductController@doLogout']);
Route::get('/admin',           ['as'=>'ShopME.admin','uses'=>'ProductController@admin']);
Route::post('/category',       ['as'=>'category.store','uses'=>'CategoryController@store']);
Route::delete('/category/{id}/', ['as'=>'category.delete','uses'=>'CategoryController@destroy']);
Route::get('/ShopME/{id}/edit',     ['as' =>'ShopME.edit','uses' => 'ProductController@edit']);
Route::patch('/ShopME/{id}',          ['as'=>'ShopME.update', 'uses'=>'ProductController@update']);
Route::delete('ShopME/{id}', ['as'=>'ShopME.delete','uses'=>'ProductController@destroy']);
Route::get('/addProduct/{productId}', 'CartController@addItem');
Route::get('/removeItem/{productId}', 'CartController@removeItem');
Route::get('/cart', 'CartController@showCart');