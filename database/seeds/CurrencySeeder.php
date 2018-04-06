<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
        	'name' => 'dollar',
        	'symbol' => '$',
        	'country' => 'United States of America',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('currencies')->insert([
        	'name' => 'rupiah',
        	'symbol' => 'Rp',
        	'country' => 'Indonesia',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('currencies')->insert([
        	'name' => 'won',
        	'symbol' => '₩',
        	'country' => 'Korea',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('currencies')->insert([
        	'name' => 'yen',
        	'symbol' => '¥',
        	'country' => 'Japan',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
