<?php

use Illuminate\Database\Seeder;

class ServiceFare extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => 'Hour',
        	'fee' => 150000,
        	'show_price' => 1,
        	'message' => 'Contact Us',
        	'service_id' => 1,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => 'Hour',
        	'fee' => 150000,
        	'show_price' => 1,
        	'message' => 'Contact Us',
        	'service_id' => 2,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => 'Hour',
        	'fee' => 150000,
        	'show_price' => 1,
        	'message' => 'Contact Us',
        	'service_id' => 3,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => 'Word',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 4,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => 'Trip',
        	'fee' => 650000,
        	'show_price' => 1,
        	'message' => 'Contact Us',
        	'service_id' => 5,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 6,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => 'Rp',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 7,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => '',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 8,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => '',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 9,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => '',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 10,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);

        DB::table('service_fares')->insert([
        	'currency' => '',
        	'period' => '',
        	'fee' => NULL,
        	'show_price' => 0,
        	'message' => 'Contact Us',
        	'service_id' => 11,
        	'created_at' => new DateTime(),
        	'updated_at' => new DateTime()
        ]);
    }
}
