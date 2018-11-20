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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.',
    'middleware' => ['auth', 'admin']], function () {
        Route::resource('member', 'MemberAdministrationController');
        Route::resource('product-administration', 'ProductAdministrationController');
    });
Route::resource('user', 'UserController')->only('index', 'edit', 'update')->middleware('auth');
