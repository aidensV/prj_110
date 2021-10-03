<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a3EwmpDosenTetapPt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a_3_ewmp_dosen_tetap_pt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('dtps');
            $table->string('ps_diakreditasi');
            $table->string('ps_lain_dalam_pt');
            $table->string('ps_lain_luar_pt');
            $table->string('penelitian');
            $table->string('pkm');
            $table->string('tugas_tambahan_penunjang');
            $table->integer('jumlah');
            $table->integer('rata_per_semester');
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
        Schema::dropIfExists('3a_3_ewmp_dosen_tetap_pt');
    }
}
