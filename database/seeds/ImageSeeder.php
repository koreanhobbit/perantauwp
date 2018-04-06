<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
        	'name' => 'noimg',
        	'location' => 'images/noimg.png',
        	'size' => 12,
        	'type' => 'image/png',
        	'user_id' => 1,
        	'created_at'=> new \DateTime(),
        	'updated_at'=> new \DateTime()
        ]);
    }
}
