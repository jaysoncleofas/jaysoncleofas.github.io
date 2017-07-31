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
Route::get('/projects/show/{project}', 'UserController@show')->name('works.show');
Route::get('/portfolio/{slug}', 'UserController@getSingle');

Auth::routes();

// Route::get('projects/{slug}', 'PortfolioController@getSingle')->name('portfolio.single')->where('slug', '[w\d\-\_]+');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/', 'UserController@store')->name('message.store');

Route::get('/skills', 'SkillController@index')->name('skills');
Route::post('/skills', 'SkillController@store')->name('skills.store');

// Route::get('/settings', 'AdminController@index')->name('settings.index');
// Route::get('/settings/edit', 'AdminController@edit')->name('settings.edit');
// Route::put('settings/update', 'AdminController@update')->name('settings.update');
Route::resource('settings', 'AdminController');

Route::resource('projects', 'ProjectController');
Route::resource('messages', 'MessageController');
