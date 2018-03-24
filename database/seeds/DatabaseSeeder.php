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
         $this->call(WliImageTableSeeder::class);
         $this->call(WliUserTableSeeder::class);
         $this->call(WliCommentTableSeeder::class);
    }
}