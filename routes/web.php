<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/index', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');

require __DIR__.'/auth.php';

Route::group(['middleware'=>['auth']], function () {

    Route::get('/dashboard', 'App\Http\Controllers\MainController@home')->name('dashboard');
});

Route::group(['middleware' => ['role:admin']], function () {

    Route::get('/orders', 'App\Http\Controllers\AdminController@index')->name('orders');

});

Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/basket/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/place', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');

Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');
