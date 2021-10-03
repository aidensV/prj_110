<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create2aSeleksiMahasiswaBaru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2a_seleksi_mahasiswa_baru', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahun_akademik');
            $table->string('daya_tampung');
            $table->string('jmlh_calon_mhs_pendftr');
            $table->string('jmlh_calon_mhs_lulus_seleksi');
            $table->string('jmlh_mhs_baru_reg');
            $table->string('jmlh_mhs_baru_trf');
            $table->string('jmlh_mhs_aktif_reg');
            $table->string('jmlh_mhs_aktif_trf');
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
        Schema::dropIfExists('2a_seleksi_mahasiswa_baru');
    }
}
