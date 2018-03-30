<?php

use Illuminate\Database\Seeder;

class WliProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('products')->get()->count() == 0) {
            $products = [
                [                    
                    'name' => 'Snack khoai tây chiên',
                    'category_id' => '6',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Snack bắp',
                    'category_id' => '6',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Snack lạc',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Khoai tây chiên',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Khoai tây que',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Cam miền Bắc',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Mận Hà Nội',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Vú sữa Lò Rèn',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Bánh khô mè bà Liễu',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Mì Quảng Quảng Nam',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Tỏi Quảng Ngãi',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Gỏi cá Nam Ô',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Chè đậu xanh',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Chè bắp',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Chè khoai',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Trà sữa Chân Châu',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Trà Hồng đào',
                    'category_id' => '4',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Mật ong thiên nhiên',
                    'category_id' => '5',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Nấm Linh Chi',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('products')->insert($products);
        }
    }
}
