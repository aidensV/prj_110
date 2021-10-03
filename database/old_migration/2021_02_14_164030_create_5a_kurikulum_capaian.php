<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5aKurikulumCapaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5a_kurikulum_capaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semester');
            $table->string('kode_matkul');
            $table->string('nama_matkul');
            $table->string('matkul_kompetensi');
            $table->string('bobot_kuliah_responsi_tutor');
            $table->string('bobot_seminar');
            $table->string('bobot_praktikum_praktik_lapangan');
            $table->string('konversi_kredit_ke_jam');
            $table->string('capaian_sikap');
            $table->string('capaian_pengetahuan');
            $table->string('capaian_keterampilan_umum');
            $table->string('capaian_keterampilan_khusus');
            $table->string('dokumen_rencana_pembelajaran');
            $table->string('unit_penyelenggara');
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
        Schema::dropIfExists('5a_kurikulum_capaian');
    }
}
