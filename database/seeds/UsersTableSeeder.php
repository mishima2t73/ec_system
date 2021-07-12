<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i < 100;$i++){
        $faker = Faker\Factory::create('ja_JP');
        DB::table('users')->insert([
            'name' => $faker->name,
            'email'=> $faker->unique()->safeEmail,
            'password' =>  Hash::make('test'),

        ]);
        }
    }
}
