<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8e1TempatKerjaLulusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8e1_tmp_krj_lulusan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun_lulus');
            $table->integer('jumlah_lulusan');
            $table->integer('jumlah_lulusan_terlacak');
            $table->integer('jumlah_lulusan_terlacak_lokal');
            $table->integer('jumlah_lulusan_terlacak_nasional');
            $table->integer('jumlah_lulusan_terlacak_internasional');
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
        Schema::dropIfExists('8e1_tempat_kerja_lulusan');
    }
}
