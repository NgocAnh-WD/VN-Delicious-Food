<?php

use Illuminate\Database\Seeder;

class WilImageTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (DB::table('images')->get()->count() == 0) {
            $images = [
                    [
                    'product_id' => '1',
                    'link_image' => 'images/2018/03/06/snack khoai tay.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '1',
                    'link_image' => 'images/2018/03/06/p7.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '2',
                    'link_image' => 'images/2018/03/06/apple.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '2',
                    'link_image' => 'images/2018/03/06/p11.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '3',
                    'link_image' => 'images/2018/03/06/hau nuong.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '3',
                    'link_image' => 'images/2018/03/06/f3.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '4',
                    'link_image' => 'images/2018/03/06/ga rang muoi.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '4',
                    'link_image' => 'images/2018/03/06/f1.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '5',
                    'link_image' => 'images/2018/03/06/juice.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '6',
                    'link_image' => 'images/2018/03/06/muc kho nuong.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '6',
                    'link_image' => 'images/2018/03/06/f1.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '7',
                    'link_image' => 'images/2018/03/06/chicken.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '7',
                    'link_image' => 'images/2018/03/06/p12.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '8',
                    'link_image' => 'images/2018/03/06/sup lo.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '8',
                    'link_image' => 'images/2018/03/06/p11.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'link_image' => 'images/2018/03/06/sushi 1.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'link_image' => 'images/2018/03/06/f3.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '10',
                    'link_image' => 'images/2018/03/06/tra sua truyen thong.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '11',
                    'link_image' => 'images/2018/03/06/beff.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '12',
                    'link_image' => 'images/2018/03/06/food1.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '13',
                    'link_image' => 'images/2018/03/06/d7.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '14',
                    'link_image' => 'images/2018/03/06/banh bong lan.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '15',
                    'link_image' => 'images/2018/03/06/mean.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '16',
                    'link_image' => 'images/2018/03/06/sinh to ca rot.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '17',
                    'link_image' => 'images/2018/03/06/pepsi lon.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '18',
                    'link_image' => 'images/2018/03/06/vit hap.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '19',
                    'link_image' => 'images/2018/03/06/troi nuoc.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'link_image' => 'images/2018/03/06/sushi.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'link_image' => 'images/2018/03/06/sushi 2.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '13',
                    'link_image' => 'images/2018/03/06/cream.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '13',
                    'link_image' => 'images/2018/03/06/ice.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '13',
                    'link_image' => 'images/2018/03/06/ice.jpg',
                    'is_delete' => '0',
                    'is_thumbnail' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('images')->insert($images);
        }
    }

}
