<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8f2KaryaIlmiahMahasiswaYangDisitasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8f2_kry_ilmiah_mhs_dsts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mahasiswa');
            $table->string('judul_artikel_yang_disitasi');
            $table->integer('jumlah_sitasi');
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
        Schema::dropIfExists('8f2_karya_ilmiah_mahasiswa_yang_disitasi');
    }
}
