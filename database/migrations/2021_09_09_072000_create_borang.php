<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('elemen');
            $table->string('no_stndr');
            $table->string('indi_penilai');
            $table->string('skor_PS');
            $table->string('skor_auditor');
            $table->string('ket');
            $table->string('stnd_unila');
            $table->string('bobot');
            $table->string('persen');
            $table->string('kinerja');
            $table->string('catatan');
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
        Schema::dropIfExists('borang');
    }
}
