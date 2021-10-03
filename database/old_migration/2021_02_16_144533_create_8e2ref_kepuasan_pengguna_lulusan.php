<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRef8aKepuasanPenggunaLulusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_8a_kepuasan_pengguna_lulusan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun_lulus');
            $table->integer('jumlah_lulusan');
            $table->integer('jumlah_tanggapan_kepuasan_pengguna_yang_terlacak');
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
        Schema::dropIfExists('ref_8a_kepuasan_pengguna_lulusan');
    }
}
