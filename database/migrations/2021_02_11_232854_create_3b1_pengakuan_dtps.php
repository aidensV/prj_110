<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b1PengakuanDtps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b1_pengakuan_dtps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('bidang_keahlian');
            $table->string('rekognisi_dan_bukti_pendukung');
            $table->string('tingkat_internasional');
            $table->string('tingkat_nasional');
            $table->string('tingkat_wilayah');
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
        Schema::dropIfExists('3b1_pengakuan_dtps');
    }
}
