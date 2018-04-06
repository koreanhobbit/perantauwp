<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
        	'name' => 'Seoul',
            'slug' => 'seoul',
        	'country_id' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Busan',
            'slug' => 'busan',
        	'country_id' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Jeju',
            'slug' => 'jeju',
        	'country_id' => 1,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Tokyo',
            'slug' => 'tokyo',
        	'country_id' => 2,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Osaka',
            'slug' => 'osaka',
        	'country_id' => 2,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Kyoto',
            'slug' => 'kyoto',
        	'country_id' => 2,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Hong Kong',
            'slug' => 'hong-kong',
        	'country_id' => 3,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Beijing',
            'slug' => 'beijing',
        	'country_id' => 3,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Ghuang Zhou',
            'slug' => 'ghuang-zhou',
        	'country_id' => 3,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);

        DB::table('areas')->insert([
        	'name' => 'Taipei',
            'slug' => 'taipei',
        	'country_id' => 4,
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
