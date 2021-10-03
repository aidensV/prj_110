<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b74LrnPnltnLnnyBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b7_4_lrn_pnltn_lnny_buku', function (Blueprint $table) {
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
        Schema::dropIfExists('3b7_4_lrn_pnltn_lnny_buku');
    }
}
