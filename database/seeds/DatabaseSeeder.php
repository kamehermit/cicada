<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventScheduleSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(BanTypeSeeder::class);
    }
}
