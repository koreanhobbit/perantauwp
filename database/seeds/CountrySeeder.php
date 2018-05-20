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
        	'name' => 'South Korea',
            'slug' => 'south-korea',
            'type' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'Japan',
            'slug' => 'japan',
            'type' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'China',
            'slug' => 'china',
            'type' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
        	'name' => 'Taiwan',
            'slug' => 'taiwan',
            'type' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('countries')->insert([
            'name' => 'Indonesia',
            'slug' => 'indonesia',
            'type' => 0,
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime(),
        ]);
    }
}
