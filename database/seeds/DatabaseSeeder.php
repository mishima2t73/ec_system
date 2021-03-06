<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ShopuserTableSeeder::class);
        $this->call(ProductSalesSeeder::class);
        //$this->call(user_address::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(makerSeeder::class);
        $this->call(CategorysSeeder::class);
    }
}
