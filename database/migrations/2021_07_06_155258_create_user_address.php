<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unique();
            $table->String('dateofbirth',12);
            $table->String('gender');
            $table->String('country_code');
            //郵便番号
            $table->integer('post_code');
            //都道府県
            $table->String('prefecture');
            //市町村
            $table->String('city');
            //番地等
            $table->String('address');
            //マンション
            $table->String('address2');
            //電話番号
            $table->String('tel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_address');
    }
}
