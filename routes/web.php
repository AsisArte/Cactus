<?php

use Illuminate\Support\Facades\Route;

/* страницы для пользователя */
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/index', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categorys', 'App\Http\Controllers\MainController@categories')->name('categorys');

/* Авторизация и т.п. */
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', 'App\Http\Controllers\MainController@home')->name('dashboard');

    /* Админ */
    Route::middleware(['role:admin'])->group(function() {
        /* заказы */
        Route::get('/orders', 'App\Http\Controllers\Admin\AdminController@index')->name('orders');
        Route::get('/orders/{order}', 'App\Http\Controllers\Admin\AdminController@show')->name('orders.show');
    });
    /* Ресурсы (категории, товары) */
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');

    /* Клиент */
    Route::group(['middleware'=>['auth']], function() {
        Route::get('/dashboard', 'App\Http\Controllers\Person\OrderController@index')->name('dashboard');
        Route::get('/dashboard/{order}', 'App\Http\Controllers\Person\OrderController@show')->name('dashboard.show');
    });
});

/* Корзина */
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::group(['middleware'=>['basket_not_empty']], function() {
    Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
    Route::get('/basket/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
    Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
    Route::post('/basket/place', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');
});

/* страницы для пользователя */
Route::get('/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/{category}/{product?}', 'App\Http\Controllers\MainController@product')->name('product');
