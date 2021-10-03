<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create6bPenelitianDtpsYangMenjadiRujukanTemaTesis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('6b_penelitian_dtps_yang_menjadi_rujukan_tema_tesis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->string('tema_penelitian_sesuai_roadmap');
            $table->string('nama_mahasiswa');
            $table->string('judul_kegiatan');
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
        Schema::dropIfExists('6b_penelitian_dtps_yang_menjadi_rujukan_tema_tesis');
    }
}
