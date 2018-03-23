<?php

use Illuminate\Database\Seeder;

class WliCategoryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (DB::table('categories')->get()->count() == 0) {
            $categories = [
                [
                    'parent_id' => '0',
                    'name' => 'Đồ đóng gói',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ], [
                    'parent_id' => '0',
                    'name' => 'Trái cây',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '0',
                    'name' => 'Đồ đặc sản',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '0',
                    'name' => 'Đồ ngọt',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '0',
                    'name' => 'Đò tốt cho sức khỏe',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '1',
                    'name' => 'Rượu nếp',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '1',
                    'name' => 'Rượu ngoại',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '1',
                    'name' => 'Rượu Đà Lạt',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '2',
                    'name' => 'Nước trái cây',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '2',
                    'name' => 'Trái cây miền Tây',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '3',
                    'name' => 'Đặc sản miền Trung',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '3',
                    'name' => 'Đặc sản miền Nam',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '4',
                    'name' => 'Chè',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '4',
                    'name' => 'Trà sữa',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '5',
                    'name' => 'Từ thiên nhiên',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'parent_id' => '5',
                    'name' => 'Không chất bảo quản',
                    'description' => 'john@gmail.com',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('categories')->insert($categories);
        }
    }

}
