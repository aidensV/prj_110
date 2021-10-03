<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create2bMahasiswaAsing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2b_mahasiswa_asing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('program_studi');
            $table->string('jml_mhs_aktif_ts2');
            $table->string('jml_mhs_aktif_ts1');
            $table->string('jml_mhs_aktif_ts');
            $table->string('jml_mhs_asing_fulltime_ts2');
            $table->string('jml_mhs_asing_fulltime_ts1');
            $table->string('jml_mhs_asing_fulltime_ts');
            $table->string('jml_mhs_asing_parttime_ts2');
            $table->string('jml_mhs_asing_parttime_ts1');
            $table->string('jml_mhs_asing_parttime_ts');
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
        Schema::dropIfExists('2b_mahasiswa_asing');
    }
}
