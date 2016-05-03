<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncluiIndisponivelTiposituacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('tiposituacao', function(Blueprint $table) {
        $table->integer('indisponivel');
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
        $table->dropColumn('indisponivel');
      });
    }
}
