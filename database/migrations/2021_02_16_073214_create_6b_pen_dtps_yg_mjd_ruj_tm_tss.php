<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create6bPenDtpsYgMjdRujTmTss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('6b_pen_dtps_yg_mjd_ruj_tm_tss', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('tema_penelitian_sesuai_roadmap');
            $table->string('nama_mahasiswa');
            $table->string('judul_kegiatan');
            $table->integer('tahun');
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
        Schema::dropIfExists('6b_pen_dtps_yg_mjd_ruj_tm_tss');
    }
}
