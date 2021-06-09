<?php

use Illuminate\Database\Seeder;

class ShopuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_users')->insert([
            'name' =>  'A',
            'gender'=> 1,
            'email'=>  'A@sol.jp',
            'password' => Hash::make('A@sol.jp'),
            'postalcode' =>1237480,
            'tel' => 84028402758,
            'address' => 'fasnoishal',
            'card_id' => '7592047388382939',
            'flag' => 0,
        ])
    }
}
