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



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('profile/follow/{user}', 'FollowsController@store');

Route::group(['prefix' => 'profile'], function(){
     
     Route::get('/edit/{user}', 'ProfileController@edit')->name('profile.edit');
     Route::patch('/update/{user}', 'ProfileController@update')->name('profile.update');
     Route::get('/{user}', 'ProfileController@index')->name('profile.show');
    
});
Route::get('/', 'PostController@index');
Route::group(['prefix' => 'p'], function(){
    Route::get('/create','PostController@create')->name('post.create');
    Route::post('/store','PostController@store')->name('post.store');
    Route::get('/show/{id}','PostController@show')->name('post.show');
});


// Socilite route
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');