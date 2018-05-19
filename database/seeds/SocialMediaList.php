<?php

use Illuminate\Database\Seeder;

class SocialMediaList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_media_types')->insert([
        	'name' => 'facebook',
        	'slug' => 'facebook',
        	'icon' => 'fa-facebook',
        	'link' => 'https://www.facebook.com/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('social_media_types')->insert([
        	'name' => 'instagram',
        	'slug' => 'instagram',
        	'icon' => 'fa-instagram',
        	'link' => 'https://www.instagram.com/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('social_media_types')->insert([
        	'name' => 'twitter',
        	'slug' => 'twitter',
        	'icon' => 'fa-twitter',
        	'link' => 'https://www.twitter.com/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('social_media_types')->insert([
        	'name' => 'linkedin',
        	'slug' => 'linkedin',
        	'icon' => 'fa-linkedin',
        	'link' => 'https://www.linkedin.com/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('social_media_types')->insert([
        	'name' => 'youtube',
        	'slug' => 'youtube',
        	'icon' => 'fa-youtube',
        	'link' => 'https://www.youtube.com/',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
