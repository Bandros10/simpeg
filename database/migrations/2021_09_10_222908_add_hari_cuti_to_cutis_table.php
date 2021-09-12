<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHariCutiToCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->integer('hari_cuti')->default(12);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->dropColumn('hari_cuti');
        });
    }
}
