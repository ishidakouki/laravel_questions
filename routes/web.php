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

Route::get('users/{id}','UsersController@show')->middleware('auth')->name('users.show');
Route::get('users/{id}/edit','UsersController@edit')->name('users.edit');
Route::post('users/{id}','UsersController@update')->name('users.update');

Route::get('questions/environment','QuestionsController@index')->name('questions.index');
Route::get('questions/new','QuestionsController@create')->name('questions.create');
Route::post('questions','QuestionsController@store')->name('questions.store');
Route::get('questions/{id}/edit','QuestionsController@edit')->name('questions.edit');
Route::post('questions/{id}/environment','QuestionsController@update')->name('questions.update');
Route::delete('questions{id}','QuestionsController@destroy')->name('questions.destroy');

Route::post('questions/comments/{id}new','CommentsController@create')->name('comments.create');
Route::post('questions/comments','CommentsController@store')->name('comments.store');
Route::get('questions/comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('questions/comments/{id}', 'CommentsController@update')->name('comments.update');
Route::delete('questions/comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
