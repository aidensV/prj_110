<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a4DosenTidakTetap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a_4_dosen_tidak_tetap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->integer('nidn_nidk');
            $table->string('pendidikan_pasca_sarjana');
            $table->string('bidang_keahlian');
            $table->string('jabatan_akademik');
            $table->string('sertifikat_pendidik_profesional');
            $table->string('sertifikat_kompetensi_profesi_industri');
            $table->string('matkul_ps_diakreditasi');
            $table->string('kesesuaian_dengan_matkul');
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
        Schema::dropIfExists('3a_4_dosen_tidak_tetap');
    }
}
