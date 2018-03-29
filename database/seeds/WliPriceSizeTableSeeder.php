<?php

use Illuminate\Database\Seeder;

class WliPriceSizeTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (DB::table('price_sizes')->get()->count() == 0) {
            $price_sizes = [
                    [
                    'product_id' => '1',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '10',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '1',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '12',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ], [
                    'product_id' => '1',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '2',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '8',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '2',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '12',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '3',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '10',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '3',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '4',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '12',
                    'quantity' => '30',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '4',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '16.90',
                    'quantity' => '22',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '4',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '20',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '5',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '5',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '22.05',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '5',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '24.99',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '6',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '100',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '6',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '150',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '6',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '200',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '7',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '35',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '7',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '49.99',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '7',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '89',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '8',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '90',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '25',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '9',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '39.99',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '10',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '13',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '10',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '11',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '100',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '11',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '140',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '12',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '69',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '12',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '100',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '13',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '10',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '14',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '15',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '16',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '15',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '16',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '22',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '17',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '20',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '17',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '30',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '18',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '300',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '18',
                    'size' => 'Trung',
                    'quality' => 'Bình thường',
                    'price' => '500',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '19',
                    'size' => 'Nhỏ',
                    'quality' => 'Bình thường',
                    'price' => '350',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'product_id' => '19',
                    'size' => 'Lớn',
                    'quality' => 'Bình thường',
                    'price' => '1000',
                    'quantity' => '20',
                    'is_delete' => '0',
                    'is_price' => '1',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('price_sizes')->insert($price_sizes);
        }
    }

}
