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
                    'name' => 'Sinh tố táo',
                    'category_id' => '6',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Hàu nướng mỡ hành',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Gà rang muối',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Sinh tố trái cây',
                    'category_id' => '7',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Mực khô nướng',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Gà quay giòn bì',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Sinh tố súp lơ',
                    'category_id' => '8',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Sushi ngũ sắc',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Trà sữa truyền thống',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Bò bít tết',
                    'category_id' => '9',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Nem chua Hà Nội',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Kem dâu tây',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Bánh bông lan',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Salad cá hồi rau củ',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Sinh tố cà rốt',
                    'category_id' => '10',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Pepsi',
                    'category_id' => '4',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Vịt hấp sả chanh',
                    'category_id' => '5',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[                    
                    'name' => 'Bánh trôi nước',
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
