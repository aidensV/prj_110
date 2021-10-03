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
            $table->integer('tingkat_kepuasan_mhs_sb');
            $table->integer('tingkat_kepuasan_mhs_b');
            $table->integer('tingkat_kepuasan_mhs_c');
            $table->integer('tingkat_kepuasan_mhs_k');
            $table->string('rencana_tindak_lanjut_ps');
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
