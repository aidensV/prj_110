<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a5DosenIndustriPraktisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a_5_dosen_industri_praktisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->integer('nidk');
            $table->string('perusahaan_atau_industri');
            $table->string('pendidikan_tertinggi');
            $table->string('bidang_keahlian');
            $table->string('sertifikat_profesi_kompetensi');
            $table->string('matkul_yang_diampu');
            $table->integer('bobot_kredit');
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
        Schema::dropIfExists('3a_5_dosen_industri_praktisi');
    }
}
