<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('events', 'CalendarEventsController');

Route::get('/location', 'HomeController@showLocation');

Route::get('/register', 'HomeController@showRegister');




Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::get('logout', 'HomeController@doLogout');




// Route::get('/', function()
// {
// 	return View::make('hello');
// });
