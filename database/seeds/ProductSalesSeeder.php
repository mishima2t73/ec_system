<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //売上明細表がPCの種類ずつ(複数の可能性がある)、売上表が合計金額
        DB::table('product_sales')->truncate(); //リセット
        DB::table('product_sales_details')->truncate(); 
        $faker = Faker\Factory::create('ja_JP');
        $start = Carbon::create("2021","4","1" );
        $end = Carbon::create("2021","7","5");
        $min = strtotime($start);
        $max = strtotime($end);
        for ($i = 0; $i < 100;$i++){
            $sales_number = $faker->randomNumber(8);
            $user_id = $faker->randomNumber(2);
            $user_name = $faker->name;
            $dept = [1,2,3,4];
            //$date = new DateTime();
            $date = rand($min, $max);
            // タイムスタンプ => Y-m-d に変換    
            $date = date('Y-m-d', $date);
            $sales_quantity = $faker->randomElement($dept);
            $total_price = 0;
            //$total_quantity =0;合計個数未使用
                //売上明細の作成
                for ($x = 0;$x <$sales_quantity;$x++){
                    $unit_price = rand(50000,100000);
                    $product_id = $faker->randomNumber(1);
                    $unit_quantity = $faker->randomElement($dept);
                    $total_price += $unit_quantity*$unit_price;
                    //$total_quantity += $unit_quantity;

                    DB::table('product_sales_details')->insert([
                        'sales_number' => $sales_number,
                        'user_id' => $user_id,
                        'product_id' => $product_id,
                        'product_name' =>$faker->lexify('???????'), 
                        'quantity' => $unit_quantity,
                        'product_price' => $unit_price,
                        'created_at' => $date,
                        'updated_at' => $date,
                    ]);
                }
            //売上
            DB::table('product_sales')->insert([
                'sales_number' => $sales_number,
                'user_id' => $user_id,
                'user_name' => $user_name,
                'sales_amount' => $total_price,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
