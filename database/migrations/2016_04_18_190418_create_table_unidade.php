<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUnidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('unidades', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome',20);
          $table->string('endereco',50);
          $table->string('cidade',20);
          $table->string('bairro',20);
          $table->string('uf',2);
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
        Schema::drop('unidades');
    }
}
