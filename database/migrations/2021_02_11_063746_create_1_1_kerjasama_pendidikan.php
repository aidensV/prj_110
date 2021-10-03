<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create11KerjasamaPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('1_1_kerjasama_pendidikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tingkat_internasional');
            $table->string('tingkat_nasional');
            $table->string('tingkat_wilayah');
            $table->string('judul_kegiatan_kerjasama');
            $table->string('manfaat_bagi_ps');
            $table->string('waktu_dan_durasi');
            $table->string('bukti_kerjasama');
            $table->string('tahun_berakhirnya_kerjasama');
            $table->string('lembaga_mitra');
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
        Schema::dropIfExists('1_1__kerjasama__pendidikan');
    }
}
