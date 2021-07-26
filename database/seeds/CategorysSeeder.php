<?php

use Illuminate\Database\Seeder;

class CategorysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           //maker
           $maker_list = ['Dell','Panasonic','Dynabook','Apple','iiyama','NEC'];
           //os
           //$os_list = ['windows7','windows8','windows10','osなし'];
           //pctype
           //$pc_type = ['デスクトップ','ノートパソコン','タブレットPC'];
           //condition
           //$condition = ['良','問題有'];

           //$dis_list = [1,1,1,1,1];
           DB::table('categorylists')->truncate();
           $m_c = 1;
           foreach($maker_list as $maker){
                DB::table('categorylists')->insert([
                   'category'=>'maker',
                   'value' => $maker,
                   'display'=>1,
                   'sort' => $m_c,
                ]);
                $m_c +=1;
           }
           $os_list = ['windows 7','windows 8','windows 10'];
           $o_c = 1;
           foreach($os_list as $os){
                DB::table('categorylists')->insert([
                    'category'=>'os',
                    'value' => $os,
                    'display'=>1,
                    'sort' => $o_c,
                ]);
                $o_c +=1;
            }
        
    }
}
