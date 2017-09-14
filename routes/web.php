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

Route::get('/', 'UserController@index')->name('index');
Route::get('/portfolio/{title}', 'UserController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home/datatables', 'HomeController@get_datatables')->name('datatables');

Route::post('/', 'UserController@store')->name('message.store');
Route::resource('skills', 'SkillController');
Route::resource('settings', 'AdminController');
Route::resource('tags', 'TagController');
Route::resource('projects', 'ProjectController');
Route::resource('messages', 'MessageController');
