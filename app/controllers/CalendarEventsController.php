<?php

class CalendarEventsController extends \BaseController {

public function __construct()
{
	parent::__construct();
	$this->beforeFilter('auth', array('except' => array('index', 'show')));
}
	/**
	 * Display a listing of the resource.
	 * GET /calendarevents
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$events = CalendarEvent::with('user')->paginate(4);

		$query = CalendarEvent::with('user');
		$query->orWhereHas('user', function($q)
		{
			$search = Input::get('search');
			$q->where('first_name', 'like', "%$search%");
		});
		$events = $query->orderBy('created_at', 'desc')->paginate(4);

		
		return View::make('events.index')->with(array('events' => $events));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /calendarevents/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$locations = Location::all();
		return View::make('events.create')->with('locations', $locations);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /calendarevents
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), CalendarEvent::$rules);
		if($validator->fails()) {
			Session::flash('errorMesage', 'Create Failed');
			Log::info('Validator failed', Input::all());
			return Redirect::back()->withInput()->withErrors($validator);
			
		} else {
			$event = new CalendarEvent();
			$event->start_time     = Input::get('start_time');
	        $event->end_time       = Input::get('end_time');
	        $event->title          = Input::get('title');
	        $event->description    = Input::get('description');
	        $event->price          = Input::get('price');
	        $event->user_id        = Auth::id();
	        $event->save();

			Log::info('Event Saved.',Input::all());
			Session::flash('successMessage', 'Created Successfully');
			return Redirect::action('CalendarEventsController@index');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$event = CalendarEvent::find($id);
		if (isset($event)) {
			return View::make('events.show')->with('event', $event);
		} else {
			App::abort(404);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /calendarevents/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event = CalendarEvent::find($id);
		return View::make('events.edit')->with('event', $event);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), CalendarEvent::$rules);
		if($validator->fails()) {
			Session::flash('errorMessage', 'Update Failed');
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$event = CalendarEvent::find($id);
			$event->start_time     = Input::get('start_time');
	        $event->end_time       = Input::get('end_time');
	        $event->title          = Input::get('title');
	        $event->description    = Input::get('description');
	        $event->price          = Input::get('price');
	        $event->user_id        = Auth::id();
			$event->save();

			Session::flash('successMessage', 'Updated Successfully');
			return Redirect::action('CalendarEventsController@index');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /calendarevents/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();
		
		Session::flash('successMessage', 'Deleted Successfully');
		return Redirect::action('CalendarEventsController@index');
	}

}