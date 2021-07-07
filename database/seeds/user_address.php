<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class user_address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //住所
        DB::table('user_address')->truncate();
        $faker = Faker\Factory::create('ja_JP');
        $start = Carbon::create("2021","4","1" );
        $end = Carbon::create("2021","7","5");
        $min = strtotime($start);
        $max = strtotime($end);
        $genlist = ["男","女"];

        for($i = 0;$i < 100;$i++){
            $user_id = $i;
            $date = rand($min, $max);
            $date = date('Y-m-d', $date);
            $dateofbirth = $faker->year."-".$faker->month."-".$faker->dayOfMonth();
            $prefecture	 = $faker->prefecture();
            $gender = $faker->randomElement($genlist);
            $post_code = $faker->postcode();
            $prefecture =$faker->prefecture();
            $city = $faker->city();
            $address = $faker->streetAddress();
            $tel = $faker->phonenumber();
            DB::table('user_address')->insert([
                'user_id' => $user_id,
                'dateofbirth' => $dateofbirth,
                'gender' => $gender,
                'country_code'=>'jp',
                'post_code'=>$post_code,
                'prefecture'=>$prefecture,
                'city' =>$city,
                'address'=>$address,
                'address2'=>' ',
                'tel' => $tel,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
            
            
        }
    }
}
