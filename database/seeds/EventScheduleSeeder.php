<?php

use Illuminate\Database\Seeder;

class EventScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_schedules')->insert([
        		'start' => '2017-03-10 10:00:00',
        		'end' => '2017-03-11 10:00:00',
        	]);
    }
}
