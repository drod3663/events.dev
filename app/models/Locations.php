<?php

class Location extends \Eloquent {

	protected $table = 'locations';

	public function calendarEvent()
	{
    return $this->belongsTo('CalendarEvent');
	}
	
	protected $rules = array(
	'title'   => 'required|max:255',
    'address' => 'required|max:255',
    'city'    => 'required|max:255',
    'state'   => 'required|max:255',
    'zip'     => 'required|max:255'
    );
	
}