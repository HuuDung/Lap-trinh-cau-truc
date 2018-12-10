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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',
    'middleware' => ['auth', 'admin']], function () {
    Route::resource('member', 'MemberAdministrationController');
    Route::get('search-member', 'MemberAdministrationController@search')->name('member.search');
    Route::resource('product-administration', 'ProductAdministrationController');
    Route::get('search-product', 'ProductAdministrationController@search')->name('product.search');
    Route::resource('category', 'CategoryAdministrationController');

});
Route::resource('user', 'UserController')->only('index', 'edit', 'update')->middleware('auth');
Route::get('add-balance', 'UserController@addBalance')->name('add.balance')->middleware('auth');
Route::post('add-balance', 'UserController@storeBalance')->name('store.balance')->middleware('auth');
Route::get('product-detail/{productId}','ProductController@show')->name('product.show');
Route::group(['prefix' => 'cart', 'as' => 'cart.', 'middleware' => ['auth']], function () {
    Route::get('/', 'CartController@index')->name('index');
    Route::post('/', 'CartController@store')->name('store');
    Route::put('/', 'CartController@update')->name('update');
    Route::delete('/', 'CartController@destroy')->name('destroy');
});
Route::get('pay/', 'HistoryController@pay')->name('pay')->middleware('auth');
Route::post('pay/', 'HistoryController@store')->name('pay.store')->middleware('auth');
Route::get('history', 'HistoryController@index')->name('history.index')->middleware('auth');
Route::get('home/search-product', 'HomeController@search')->name('home.product.search');
