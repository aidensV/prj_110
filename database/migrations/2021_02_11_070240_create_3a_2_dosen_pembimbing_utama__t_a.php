<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a2DosenPembimbingUtamaTA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a_2_dospem_utama_ta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->integer('ps_diakreditasi_ts2');
            $table->integer('ps_diakreditasi_ts1');
            $table->integer('ps_diakreditasi_ts');
            $table->integer('ps_lain_ts2');
            $table->integer('ps_lain_ts1');
            $table->integer('ps_lain_ts');
            $table->integer('rata_jmlh_bimbingan');
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
        Schema::dropIfExists('3a_2_dosen_pembimbing_utama__t_a');
    }
}
