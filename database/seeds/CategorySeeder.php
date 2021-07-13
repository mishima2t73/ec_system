<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           //maker
           $maker_list = ['Dell','Panasonic','Dynabook','Apple','iiyama'];
           //os
           //$os_list = ['windows7','windows8','windows10','osなし'];
           //pctype
           //$pc_type = ['デスクトップ','ノートパソコン','タブレットPC'];
           //condition
           //$condition = ['良','問題有'];

           //$dis_list = [1,1,1,1,1];
           DB::table('categorylist')->truncate();
           
           foreach($maker_list as $maker){
               DB::table('categorylist')->insert([
                   'category'=>'maker',
                   'value' => $maker,
                   'display'=>1,
               ]);
           }   
    }
}
