<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8f11PublikasiIlmiahMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8f1_1_publikasi_ilmiah_mhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_publikasi');
            $table->integer('jumlah_judul_ts2');
            $table->integer('jumlah_judul_ts1');
            $table->integer('jumlah_judul_ts');
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
        Schema::dropIfExists('8f1_1_publikasi_ilmiah_mahasiswa');
    }
}
