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
         $this->call(WliCategoryTableSeeder::class);
         $this->call(WliProductTableSeeder::class);
         $this->call(WliPriceSizeTableSeeder::class);
         $this->call(WilImageTableSeeder::class);
         $this->call(WilUserTableSeeder::class);
         $this->call(WilCommentTableSeeder::class);
    }
}