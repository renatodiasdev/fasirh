<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('funcionarios', function(Blueprint $table) {
        $table->integer('unidade_id');
        $table->integer('setor_id');
        $table->integer('cargo_id');
        $table->dropColumn('unidade');
        $table->dropColumn('setor');
        $table->dropColumn('cargo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('setores', function(Blueprint $table) {
        $table->string('cargo',20);
        $table->string('setor',20);
        $table->string('unidade',20);
        $table->dropColumn('unidade_id');
        $table->dropColumn('setor_id');
        $table->dropColumn('cargo_id');
      });
    }
}
