<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
        	['title' => 'terminal','name' => 'terminal','url' => 'terminal'],
        	['title' => 'level1','name' => 'level1', 'url' => 'level1']
        );
        DB::table('pages')->insert($data);
    }
}
