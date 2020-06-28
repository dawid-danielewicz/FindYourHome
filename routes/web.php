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

Route::get('/','FrontendController@index');
Route::post('/search', 'FrontendController@search')->name('search');
Route::get('/advert/{id}/{name}', 'FrontendController@advert')->name('advert');
Route::get('searchAdverts', 'FrontendController@searchAdverts');
Route::get('/user/{id}/adverts', 'FrontendController@useradverts')->name('userAdverts');
Route::post('/sendMessage', 'FrontendController@sendMessage')->name('sendMessage');
Route::get('/articles', 'FrontendController@getArticles')->name('getArticles');
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'BackendController@index')->name('adverts');
    Route::get('/addAdvert', 'BackendController@addAdvert')->name('addAdvert');
    Route::get('/messages', 'BackendController@messages')->name('messages');
    Route::get('/cities', 'BackendController@cities')->name('cities');
    Route::post('/saveCity', 'BackendController@saveCity')->name('saveCity');
    Route::get('/searchAdverts', 'FrontendController@searchAdverts');
    Route::get('/addCity', 'BackendController@addCity')->name('addCity');
    Route::post('/updateCity/{id}', 'BackendController@updateCity')->name('updateCity');
    Route::get('/editCity/{id}', 'BackendController@editCity')->name('editCity');
    Route::get('/users', 'Backendcontroller@users')->name('users');
    Route::match(['GET', 'POST'],'/user', 'BackendController@user')->name('user');
    Route::get('/deletePhoto/{id}', 'BackendController@deletePhoto')->name('deletePhoto');
    Route::get('/deleteCity/{id}', 'BackendController@deleteCity')->name('deleteCity');
    Route::get('/deleteUser/{id}', 'BackendController@deleteUser')->name('deleteUser');
    Route::get('/deleteMessage/{id}', 'BackendController@deleteMessage')->name('deleteMessage');
    Route::get('/advert/observe/{id}', 'BackendController@observe')->name('observe');
    Route::get('/advert/unobserve/{id}', 'BackendController@unObserve')->name('unObserve');
    Route::get('/observables', 'BackendController@observables')->name('observables');


});

Auth::routes();

