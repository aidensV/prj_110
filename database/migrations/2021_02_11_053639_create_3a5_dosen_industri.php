<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a5DosenIndustri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a5_dosen_industri', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen_industri');
            $table->integer('nidk');
            $table->string('perusahaan');
            $table->string('pendidikan_tertinggi');
            $table->string('bidang_keahlian');
            $table->string('sertifikat_profesi');
            $table->string('mata_kuliah');
            $table->integer('bobot_kredit');
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
        Schema::dropIfExists('3a5_dosen_industri');
    }
}
