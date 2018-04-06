<?php

use Illuminate\Database\Seeder;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themesettings')->insert([
        	'name' => 'medicio',
            'path' => 'frontend/medicio/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
