<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IncluiIndisponivelSituacaofuncional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('situacaofuncional', function(Blueprint $table) {
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
      Schema::table('situacaofuncional', function(Blueprint $table) {
        $table->dropColumn('indisponivel');
      });
    }
}
