<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8f3ProdukDtpsMahasiswaYangDiadopsiIndustri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8f3_produk_dtps_mhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mahasiswa');
            $table->string('nama_produk');
            $table->string('deskripsi_produk');
            $table->string('bukti');
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
        Schema::dropIfExists('8f3_produk_dtps_mahasiswa_yang_diadopsi_industri');
    }
}
