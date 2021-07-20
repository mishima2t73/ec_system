<?php

use Illuminate\Database\Seeder;

class makerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //makerlist
        $maker_list = ['Dell','Panasonic','Dynabook','Apple','iiyama'];
        $dis_list = [1,1,1,1,1];
        DB::table('makerlist')->truncate();
        
        foreach($maker_list as $maker){
            DB::table('makerlist')->insert([
                'maker'=>$maker,
                'display'=>1,
            ]);
        }            
    
}
}
