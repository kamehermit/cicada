<?php

use Illuminate\Database\Seeder;

class BanTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['type' => 'alpha'],
        	['type' => 'beta'],
            ['type' => 'gamma']
        );
        DB::table('ban_types')->insert($data);
    }
}
