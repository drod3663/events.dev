<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CalendarEventsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		for($i = 0; $i < 10; $i +=1)
		{
			$event = new CalendarEvent();
			$event->start_time     = '2015-10-31 12:00:00';
	        $event->end_time       = '2015-11-1 12:00:00';
	        $event->title          = $faker->catchPhrase;
	        $event->description    = $faker->text(100);
	        $event->price          = '1000';
	        $event->user_id        = User::all()->random()->id;
	        $event->location_id    = Location::all()->random()->id;
	        $event->save();
		}
	}
}	