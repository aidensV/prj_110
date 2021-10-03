<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8e2KepuasanPgnLlsn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8e2_kepuasan_pgn_llsn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_kemampuan');
            $table->string('tingkat_kep_peng_sb');
            $table->string('tingkat_kep_peng_b');
            $table->string('tingkat_kep_peng_c');
            $table->string('tingkat_kep_peng_k');
            $table->string('rcn_tdk_lanjut_oleh_upps');
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
        Schema::dropIfExists('8e2_kepuasan_pgn_llsn');
    }
}
