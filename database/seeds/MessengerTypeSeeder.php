<?php

use Illuminate\Database\Seeder;

class MessengerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messenger_types')->insert([
        	'name' => 'Kakao Talk ID',
        	'slug' => 'kakaotalkid',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

		DB::table('messenger_types')->insert([
        	'name' => 'Line ID',
        	'slug' => 'lineid',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('messenger_types')->insert([
        	'name' => 'We Chat ID',
        	'slug' => 'wechatid',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('messenger_types')->insert([
        	'name' => 'Telegram',
        	'slug' => 'telegram',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('messenger_types')->insert([
        	'name' => 'Facebook Messenger',
        	'slug' => 'facebookmessenger',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
