<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8d2KesesuaianBidangKerjaLulusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8d2_kesesuaian_bkl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun_lulus');
            $table->integer('jumlah_lulusan');
            $table->integer('jumlah_lulusan_yang_terlacak');
            $table->integer('jml_lulusan_terlacak_dgn_tingkat_kesesuaian_rendah');
            $table->integer('jml_lulusan_terlacak_dgn_tingkat_kesesuaian_sedang');
            $table->integer('jml_lulusan_terlacak_dgn_tingkat_kesesuaian_tinggi');
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
        Schema::dropIfExists('8d2_kesesuaian_bidang_kerja_lulusan');
    }
}
