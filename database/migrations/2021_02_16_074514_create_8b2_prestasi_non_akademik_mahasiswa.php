<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8b2PrestasiNonAkademikMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8b2_prestasi_nonakdmk_mhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kegiatan');
            $table->integer('waktu_perolehan');
            $table->string('tingkat_lokal');
            $table->string('tingkat_nasional');
            $table->string('tingkat_internasional');
            $table->string('prestasi_yang_dicapai');
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
        Schema::dropIfExists('8b2_prestasi_non_akademik_mahasiswa');
    }
}
