<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncluiIdSituacaofuncional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('situacaofuncional', function(Blueprint $table) {
        $table->increments('id')->before('empresa_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('situacaofuncional', function(Blueprint $table) {
        $table->dropColumn('id');
      });
    }
}
