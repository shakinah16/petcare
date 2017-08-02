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

Route::get('/users/{id}', function ($id){
    return 'This is user ' .$id;
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{id}/{name}', function ($id, $name){
    return 'This is user ' .$name.' with an ID of '.$id;
});

Route::get('/about', function () {
    return view('pages.about');
    return view('pages/about'); is also acceptable
});
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('pages.about', 'PagesController@about');
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Route::resource('pets', 'PetsController');
Route::resource('products', 'ProductsController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

