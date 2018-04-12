<?php

use Illuminate\Database\Seeder;

class SettingContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('websosmeds')->insert([
        	'name' => 'Facebook',
            'slug' => 'facebook',
        	'icon' => 'fa-facebook',
        	'domain' => 'https://www.facebook.com/',
        	'value' => 'Astroweb-Studio-360619234350331',
        	'setting_id' => '1',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('websosmeds')->insert([
        	'name' => 'Instagram',
            'slug' => 'instagram',
        	'icon' => 'fa-instagram',
        	'domain' => 'https://www.instagram.com/',
        	'value' => '',
        	'setting_id' => '1',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('websosmeds')->insert([
        	'name' => 'Twitter',
            'slug' => 'twitter',
        	'icon' => 'fa-twitter',
        	'domain' => 'https://www.twitter.com/',
        	'value' => '',
        	'setting_id' => '1',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('websosmeds')->insert([
        	'name' => 'Youtube',
            'slug' => 'youtube',
        	'icon' => 'fa-youtube',
        	'domain' => 'https://www.youtube.com/',
        	'value' => '',
        	'setting_id' => '1',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('websosmeds')->insert([
        	'name' => 'Linkedin',
            'slug' => 'linkedin',
        	'icon' => 'fa-linkedin',
        	'domain' => 'https://www.linkedin.com/',
        	'value' => '',
        	'setting_id' => '1',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
