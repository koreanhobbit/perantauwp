<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ThumbnailSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ThemeSettingSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(BackgroundSeeder::class);
        $this->call(BackgroundPivotSeeder::class);
        $this->call(ColorPivotSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(SettingContactSeeder::class);
    }
}
