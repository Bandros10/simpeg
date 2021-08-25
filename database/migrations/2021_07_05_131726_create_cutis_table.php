<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->increments('id_cuti');
            $table->integer('id_pegawai');
            $table->string('nama_pengaju');
            $table->string('devisi');
            $table->string('jabatan_pengaju');
            $table->string('telepon');
            $table->string('jumlah_cuti');
            $table->string('tgl_awal');
            $table->string('tgl_akhir');
            $table->text('keterangan');
            $table->tinyInteger('status')->default(0);
            $table->boolean('status_kepala')->default(false);
            $table->boolean('status_hrd')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cutis');
    }
}
