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


Route::get('/','QuestionsController@index')->middleware('auth')->name('index');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.display');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.display');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
  Route::get('/{id}','UsersController@show')->middleware('auth')->name('show');
  Route::get('/{id}/edit','UsersController@edit')->name('edit');
  Route::post('/{id}','UsersController@update')->name('update');
});

Route::group(['as' => 'questions.'], function(){
  Route::get('questions/environment','QuestionsController@index')->name('index');
  Route::get('questions/new','QuestionsController@create')->name('create');
  Route::post('questions','QuestionsController@store')->name('store');
  Route::get('questions/{id}/edit','QuestionsController@edit')->name('edit');
  Route::post('questions/{id}/environment','QuestionsController@update')->name('update');
  Route::delete('questions{id}','QuestionsController@destroy')->name('destroy');
});

Route::group(['prefix' => 'questions', 'as' => 'comments.'], function(){
  Route::post('/comments/{id}new','CommentsController@create')->name('create');
  Route::post('/comments','CommentsController@store')->name('store');
  Route::get('/comments/{id}/edit', 'CommentsController@edit')->name('edit');
  Route::put('/comments/{id}', 'CommentsController@update')->name('update');
  Route::delete('/comments/{id}', 'CommentsController@destroy')->name('destroy');
});
