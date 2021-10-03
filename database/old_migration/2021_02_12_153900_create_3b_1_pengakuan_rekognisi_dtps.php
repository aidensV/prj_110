<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b1PengakuanRekognisiDtps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b_1_pengakuan_rekognisi_dtps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('bidang_keahlian');
            $table->string('rekognisi_dan_bukti_pendukung');
            $table->string('tingkat_wilayah');
            $table->string('tingkat_nasional');
            $table->string('tingkat_internasional');
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
        Schema::dropIfExists('3b_1_pengakuan_rekognisi_dtps');
    }
}
