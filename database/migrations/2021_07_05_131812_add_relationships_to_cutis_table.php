<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cutis', function (Blueprint $table) {
            $table->integer('id_pegawai')->unsigned()->change();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais')
                ->onUpdate('cascade')->onDelete('cascade');
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
            $table->dropForeign('cutis_id_pegawai_foreign');
        });
        Schema::table('cutis', function (Blueprint $table) {
            $table->dropIndex('cutis_id_pegawai_foreign');
        });
        Schema::table('cutis', function (Blueprint $table) {
            $table->integer('id_pegawai')->change();
        });
    }

}
