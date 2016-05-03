<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncluiEmpresaidTiposituacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tiposituacao', function(Blueprint $table) {
        $table->integer('empresa_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('tiposituacao', function(Blueprint $table) {
        $table->dropColumn('empresa_id');
      });
    }
}
