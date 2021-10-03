<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b6ProdukDtpsDiadopsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b_6_produk_dtps_diadopsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('nama_produk_jasa');
            $table->string('deskripsi');
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
        Schema::dropIfExists('3b_6_produk_dtps_diadopsi');
    }
}
