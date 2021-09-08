<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'BuiHuuThanh',
            'email'=>'buithanh281002@gmail.com',
            'password'=>'05032810',
            'role'=>'1',
        ]);

        DB::table('furniture')->insert([
            'name'=>'ghe',
            'price'=>'1000000',
            'imgFullNameGallery'=>'95525_talclinen_v1.jpg'
        ]);
    }
}
