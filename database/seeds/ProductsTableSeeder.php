<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $name = ['pc1'];
        $maker = ['Dell'];
        $model_id = [123];
        $price = [10000];
        $stock = [4];
        $cpu = ['cel3'];
        $memory = ['16GB'];
        $graphic = ['intel'];
        $hdd_ssd = ['HDD 100GB'];
        $drive = ['無'];
        $display = ['12.5インチ / FWXGA(1366x768)'];
        $os = ['Win7 Pro 32bit'];
        $attached = ['ACアダプター'];
        $remarks = ['登録日 21/05/20、バッテリー充電不可（ＡＣアダプタで動作します）'];
        $condition = ['良'];
        $staff_id = [1];
        $new_product=[1];
        $image =['lautesfa.png'];
        $pc_type = [0];
        
        DB::table('products')->insert([
            'name'=>$name,
            'maker'=>$maker,
            'model_id'=>$model_id,
            'price'=>$price,
            'stock'=>$stock,
            'cpu'=>$cpu,
            'memory'=>$memory,
            'graphic'=>$graphic,
            'hdd_ssd'=>$hdd_ssd,
            'drive'=>$drive,
            'display'=>$display,
            'os'=>$os,
            'attached'=>$attached,
            'remarks'=>$remarks,
            'condition'=>$condition,
            'staff_id'=>$staff_id,
            'new_product'=>$new_product,
            'pc_type'=>$pc_type,
            'image'=>$image,
            //'created_at' => new Datetime(),
            //'updated_at' => new Datetime()
        ]);

    }
}
