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
        		'start' => '2017-09-07 10:00:00',
        		'end' => '2017-09-20 10:00:00',
        	]);
    }
}
