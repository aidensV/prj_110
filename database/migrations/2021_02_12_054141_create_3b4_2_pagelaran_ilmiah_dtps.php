<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b42PagelaranIlmiahDtps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b4_2_pagelaran_ilmiah_dtps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_publikasi');
            $table->integer('jmlh_judul_ts2');
            $table->integer('jmlh_judul_ts1');
            $table->integer('jmlh_judul_ts');
            $table->integer('jumlah');
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
        Schema::dropIfExists('3b4_2_pagelaran_ilmiah_dtps');
    }
}
