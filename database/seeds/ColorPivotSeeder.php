<?php

use Illuminate\Database\Seeder;

class ColorPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('color_themesetting')->insert([
            'color_id' => 1,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
        	'color_id' => 2,
        	'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 3,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 4,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 5,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 6,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 7,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 8,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 9,
            'themesetting_id' => 1,
        ]);

       DB::table('color_themesetting')->insert([
            'color_id' => 10,
            'themesetting_id' => 1,
        ]);

    }
}
