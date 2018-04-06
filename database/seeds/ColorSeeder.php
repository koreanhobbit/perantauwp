<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('colors')->insert([
            'name' => 'amethyst',
            'location' => 'frontend/medicio/color/amethyst.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
        	'name' => 'blue',
            'location' => 'frontend/medicio/color/blue.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'default',
            'location' => 'frontend/medicio/color/default.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'green',
            'location' => 'frontend/medicio/color/green.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'lime',
            'location' => 'frontend/medicio/color/lime.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'orange',
            'location' => 'frontend/medicio/color/orange.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'pink',
            'location' => 'frontend/medicio/color/pink.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'red',
            'location' => 'frontend/medicio/color/red.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'sand',
            'location' => 'frontend/medicio/color/sand.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

        DB::table('colors')->insert([
            'name' => 'yellow',
            'location' => 'frontend/medicio/color/yellow.css',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);

    }
}
