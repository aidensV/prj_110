<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5bIntegrasiKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5b_integrasi_kegiatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_penelitian');
            $table->string('nama_dosen');
            $table->string('mata_kuliah');
            $table->string('bentuk_integrasi');
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
        Schema::dropIfExists('5b_integrasi_kegiatan');
    }
}
