<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showLocation()
	{
		return View::make('location');
	}

	public function showRegister()
	{
		return View::make('register');
	}

	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
    		return Redirect::action('CalendarEventsController@index');
		} else {
    		Session::flash('errorMessage', 'Login Failed');
			// Log::info('Validator failed', Input::get('email'));
			
			return Redirect::action('HomeController@showLogin');
		}
	}

	public function doLogout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Logged Out Successfully');
		return Redirect::action('CalendarEventsController@index');
	}
}



