<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
        	'name' => 'Miscellaneous',
        	'created_at' => new \DateTime(),
        	'updated_at' => new \DateTime(),
        ]);
    }
}
