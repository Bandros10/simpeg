<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id_pegawai');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('nik');
            $table->string('devisi');
            $table->string('jabatan');
            $table->string('status');
            $table->string('agama');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk');
            $table->string('tanggungan')->nullable();
            $table->string('pend_terakhir');
            $table->string('pend_ditempuh')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
}
