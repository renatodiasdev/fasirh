<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableSetor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('setores', function(Blueprint $table) {
        $table->integer('empresa_id')->after('nome');
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
        $table->dropColumn('empresa_id');
      });
    }
}
