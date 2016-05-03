<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSituacaofuncional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacaofuncional', function (Blueprint $table){
          $table->integer('empresa_id');
          $table->integer('funcionario_id');
          $table->integer('unidade_id');
          $table->integer('setor_id');
          $table->integer('cargo_id');
          $table->integer('situacao_id');
          $table->date('inicio');
          $table->date('final');
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
        Schema::drop('situacaofuncional');
    }
}
