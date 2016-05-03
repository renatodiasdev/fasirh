<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RetiraUnidadeidSetoridCargoid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('funcionarios', function(Blueprint $table) {
        $table->dropColumn('unidade_id');
        $table->dropColumn('setor_id');
        $table->dropColumn('cargo_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('funcionarios', function(Blueprint $table) {
        $table->integer('unidade_id');
        $table->integer('setor_id');
        $table->integer('cargo_id');
      });
    }
}
