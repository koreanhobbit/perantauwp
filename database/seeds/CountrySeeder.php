<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
        	'name' => 'Korea Selatan',
            'slug' => 'korea-selatan',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'Jepang',
            'slug' => 'jepang',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'Cina',
            'slug' => 'cina',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'Taiwan',
            'slug' => 'taiwan',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
