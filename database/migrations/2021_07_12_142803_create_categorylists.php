<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorylists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorylists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sort');
            $table->String('category');
            $table->String('value');
            $table->integer('display');//shop画面で表示するか否か
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
        Schema::dropIfExists('categorylists');
    }
}
