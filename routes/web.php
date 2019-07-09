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
//Guest
Route::get('/', 'GuestController@index');

//Authenticated
Route::get('/edit-user', 'HomeController@edit_user');
Route::put('/update-info', 'HomeController@update_user');

//Posting
Route::get('/feed', 'AuthController@index');
Route::get('/upload', 'SnippetsController@create');
Route::post('/store', 'SnippetsController@store');
Route::get('/edit-snippet/{id}', 'SnippetsController@edit');
Route::delete('/delete-snippet/{id}', 'SnippetsController@destroy');
Route::put('/update-snippet/{id}', 'SnippetsController@update');
//Commenting
Route::post('/comment', 'CommentsController@store')->name('comment');
Route::get('/manage-comments', 'CommentsController@manage')->name('manageComments');
Route::get('/edit-comment/{id}', 'CommentsController@edit');
Route::put('/update-comment/{id}', 'CommentsController@update');
Route::delete('/delete-comment/{id}', 'CommentsController@destroy');
//Liking
Route::post('/like', 'LikesController@like')->name('like');
Auth::routes();

Route::get('/dashboard', 'HomeController@index');
