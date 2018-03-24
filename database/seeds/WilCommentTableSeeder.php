<?php

use Illuminate\Database\Seeder;

class WilCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('comments')->get()->count() == 0) {
            $comments = [
                [
                    'user_id' => '1',
                    'product_id' => '1',
                    'parent_id' => '0',
                    'title' => 'Đồ đóng gói này ngon và rẻ',
                    'content' => 'Tôi mua nó mà aznw hoài không ngán',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ], [
                    'user_id' => '2',
                    'product_id' => '2',
                    'parent_id' => '0',
                    'title' => 'Trái cây này ngon và rẻ',
                    'content' => 'Giao hàng rẻ và nhanh',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '3',
                    'product_id' => '4',
                    'parent_id' => '0',
                    'title' => 'Thức ăn quá đắt',
                    'content' => 'Tôi mua nó đắt mà ăn không ngon',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '4',
                    'product_id' => '6',
                    'parent_id' => '0',
                    'title' => 'Đồ đóng gói này ngon và rẻ',
                    'content' => 'Tôi mua nó mà aznw hoài không ngán',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '1',
                    'product_id' => '7',
                    'parent_id' => '0',
                    'title' => 'Sức khỏe cải thiện',
                    'content' => 'Tôi mua sản phẩm cảm thấy rất tốt',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '2',
                    'product_id' => '7',
                    'parent_id' => '5',
                    'title' => 'Sức khỏe tốt hơn',
                    'content' => 'Tôi đồng ý với ý kiến của bạn',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '3',
                    'product_id' => '6',
                    'parent_id' => '4',
                    'title' => 'Sức khỏe cải thiện',
                    'content' => 'Tôi mua sản phẩm cảm thấy rất tốt',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '1',
                    'product_id' => '2',
                    'parent_id' => '3',
                    'title' => 'Sức khỏe cải thiện',
                    'content' => 'Tôi mua sản phẩm cảm thấy rất tốt',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '3',
                    'product_id' => '2',
                    'parent_id' => '2',
                    'title' => 'Sức khỏe cải thiện',
                    'content' => 'Tôi mua sản phẩm cảm thấy rất tốt',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'user_id' => '4',
                    'product_id' => '1',
                    'parent_id' => '1',
                    'title' => 'Sức khỏe cải thiện',
                    'content' => 'Tôi mua sản phẩm cảm thấy rất tốt',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('comments')->insert($comments);
        }
    }
}
