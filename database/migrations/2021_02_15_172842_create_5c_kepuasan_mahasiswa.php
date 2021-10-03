<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5cKepuasanMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5c_kepuasan_mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aspek_yang_diukur');
            $table->string('tingkat_kepuasan_mahasiswa_sangat_baik');
            $table->string('tingkat_kepuasan_mahasiswa_baik');
            $table->string('tingkat_kepuasan_mahasiswa_cukup');
            $table->string('tingkat_kepuasan_mahasiswa_kurang');
            $table->string('rencana_tidak_lanjut_oleh_upps');
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
        Schema::dropIfExists('5c_kepuasan_mahasiswa');
    }
}
