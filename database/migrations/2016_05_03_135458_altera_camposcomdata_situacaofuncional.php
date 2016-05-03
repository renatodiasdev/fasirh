<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteraCamposcomdataSituacaofuncional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('situacaofuncional', function(Blueprint $table) {
        $table->date('inicio')->nullable()->change();
        $table->date('final')->nullable()->change();
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
        $table->date('inicio');
        $table->date('final');
      });
    }
}
