<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('funcionarios', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nome',50);
          $table->string('sexo',10);
          $table->date('nascimento');
          $table->string('cpf',11);
          $table->string('rg',15);
          $table->string('ctps',15);
          $table->string('cargo',20);
          $table->string('setor',20);
          $table->string('unidade',20);
          $table->date('admissao');
          $table->date('saida');
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
        Schema::drop('funcionarios');
    }
}
