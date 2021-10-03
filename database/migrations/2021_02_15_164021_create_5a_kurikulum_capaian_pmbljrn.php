<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5aKurikulumCapaianPmbljrn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5a_kurikulum_capaian_pmbljrn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('semester');
            $table->integer('kode_matkul');
            $table->string('nama_matkul');
            $table->string('matkul_kompetensi');
            $table->integer('bobot_kredit_kuliah');
            $table->integer('bobot_kredit_seminar');
            $table->integer('bobot_kredit_praktikum');
            $table->integer('konversi_kredit_ke_jam');
            $table->integer('capaian_pembelajaran_sikap');
            $table->integer('capaian_pembelajaran_pengetahuan');
            $table->integer('capaian_pembelajaran_keterampilan_umum');
            $table->integer('capaian_pembelajaran_keterampilan_khusus');
            $table->string('dokummen_rencana_pembelajaran');
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
        Schema::dropIfExists('5a_kurikulum_capaian_pmbljrn');
    }
}
