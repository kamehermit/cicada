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
        	['title' => 'terminal','name' => 'terminal','url' => '/quest/1/terminal'],
        	['title' => 'level2','name' => 'level2', 'url' => '/quest/2/redirect/false/level2'],
            ['title' => 'cmail','name' => 'cmail','url' => '/quest/3/cmail']
        );
        DB::table('pages')->insert($data);
    }
}
