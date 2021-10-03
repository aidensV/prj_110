<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8f41LuaranPenelitianYangDihasilkanMahasiswaPaten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8f4_1_luaran_penelitian_mp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('luaran_penelitian_dan_pkm');
            $table->integer('tahun');
            $table->string('keterangan');
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
        Schema::dropIfExists('8f4_1_luaran_penelitian_yang_dihasilkan_mahasiswa_paten');
    }
}
