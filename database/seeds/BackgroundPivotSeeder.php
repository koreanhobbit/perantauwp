<?php

use Illuminate\Database\Seeder;

class BackgroundPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('background_themesetting')->insert([
        	'background_id' => 1,
        	'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 2,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 3,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 4,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 5,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 6,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 7,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 8,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 9,
            'themesetting_id' => 1,
        ]);

        DB::table('background_themesetting')->insert([
            'background_id' => 10,
            'themesetting_id' => 1,
        ]);
    }
}
