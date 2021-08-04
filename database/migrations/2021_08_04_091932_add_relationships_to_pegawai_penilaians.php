<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToPegawaiPenilaians extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawai_penilaians', function (Blueprint $table) {
            $table->integer('id_pegawai')->unsigned()->change();
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pegawai_penilaians', function (Blueprint $table) {
            $table->dropForeign('pegawai_penilaians_id_pegawai_foreign');
        });
        Schema::table('pegawai_penilaians', function (Blueprint $table) {
            $table->dropIndex('pegawai_penilaians_id_pegawai_foreign');
        });
        Schema::table('pegawai_penilaians', function (Blueprint $table) {
            $table->integer('id_pegawai')->change();
        });
    }
}
