<?php

class CalendarEvent extends \Eloquent {
	protected $fillable = [];

	protected $table = 'calendar_events';

	public function user()
	{
    return $this->belongsTo('User');
	}

	/*relationship*/
	public function Locations()
	{
    return $this->hasMany('Location');
	}

	public static $rules = array(
	'start_time' => 'required|max:255',
	'end_time' => 'required|max:255',
	'title' => 'required|max:255',
	'description' => 'required|max:255',
	'price' => 'required|max:10',
	
	);
}