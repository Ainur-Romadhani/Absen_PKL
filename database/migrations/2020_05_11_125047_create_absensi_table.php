<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absen');
            $table->string('tanggal_absen');
            $table->string('jam');
            $table->string('status');
            $table->string('SIA');
            $table->string('laporan');
            $table->string('lokasi');
            $table->string('keterangan');
            $table->integer('id')->unsigned();
            $table->integer('id_siswa')->unsigned();
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
        Schema::dropIfExists('absensi');
    }
}
