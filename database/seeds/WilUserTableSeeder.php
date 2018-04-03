<?php

use Illuminate\Database\Seeder;

class WilUserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        if (DB::table('users')->get()->count() == 0) {
            $users = [
                    [
                    'username' => 'nhinguyen',
                    'password' => bcrypt('secret'),
                    'avata_image' => '',
                    'full_name' => 'nhinguyen',
                    'email' => 'nhi.nguyen@student.passerellesnumeriques.org',
                    'date_of_birth' => '1997/01/04',
                    'gender' => 'Male',
                    'phone' => '01216045302',
                    'address' => 'Da Nang',
                    'remember_token' => 'wdBkzLIeQKSyesZjnJLMolVcCLAJKVHHzsOYN4ERqqfd7nWb0LK7VCZXgQ1a',
                    'is_active' => '0',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ], [
                    'username' => 'thuongnguyen',
                    'password' => bcrypt('secret'),
                    'avata_image' => '',
                    'full_name' => 'thuongnguyen',
                    'email' => 'thuong.nguyen@student.passerellesnumeriques.org',
                    'date_of_birth' => '1996/06/01',
                    'gender' => 'Female',
                    'phone' => '01678408880',
                    'address' => 'Quang Tri',
                    'remember_token' => 'qgLEgQLnQhD6IzmFF0LrHxPIZPR2kDZ26r9iWhu1ilKXCwTtAODP5Ca1Tbnt',
                    'is_active' => '0',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'username' => 'anhnguyen',
                    'password' => bcrypt('secret'),
                    'avata_image' => '',
                    'full_name' => 'anhnguyen',
                    'email' => 'anh.nguyen@student.passerellesnumeriques.org',
                    'date_of_birth' => '1998/03/09',
                    'gender' => 'Female',
                    'phone' => '324565432',
                    'address' => 'Quang Binh',
                    'remember_token' => 'jxRzQV514khc7GejsQjjm7Joo68WvyLBVfxWVO16RbWAYl0gAjgeXopqTvgb',
                    'is_active' => '0',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ],[
                    'username' => 'duyenngo',
                    'password' => bcrypt('secret'),
                    'avata_image' => '',
                    'full_name' => 'duyenngo',
                    'email' => 'duyen.ngo@student.passerellesnumeriques.org',
                    'date_of_birth' => '1997/09/05',
                    'gender' => 'Female',
                    'phone' => '12345',
                    'address' => 'Da Nang',
                    'remember_token' => 'Iq2mIKCYPAa0tHQBLH2NNvD16HRP30EszDnPZaoinySncwSME8iddh4gjKLF',
                    'is_active' => '0',
                    'is_delete' => '0',
                    'created_at' => DB::raw('now()'),
                    'updated_at' => DB::raw('now()'),
                ]
            ];
            DB::table('users')->insert($users);
        }
    }

}
