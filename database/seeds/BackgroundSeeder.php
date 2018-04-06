<?php

use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('backgrounds')->insert([
        	'name' => 'bg1',
            'location' => 'frontend/medicio/bodybg/bg1.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg2',
            'location' => 'frontend/medicio/bodybg/bg2.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg3',
            'location' => 'frontend/medicio/bodybg/bg3.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg4',
            'location' => 'frontend/medicio/bodybg/bg4.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg5',
            'location' => 'frontend/medicio/bodybg/bg5.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg6',
            'location' => 'frontend/medicio/bodybg/bg6.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg7',
            'location' => 'frontend/medicio/bodybg/bg7.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg8',
            'location' => 'frontend/medicio/bodybg/bg8.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg9',
            'location' => 'frontend/medicio/bodybg/bg9.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('backgrounds')->insert([
        	'name' => 'bg10',
            'location' => 'frontend/medicio/bodybg/bg10.css',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
