<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemenLkps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemen_lkps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kriteria');
            $table->string('deskripsi');
            $table->string('bobot');
            $table->string('kode_tabel');
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
        Schema::dropIfExists('elemen_lkps');
    }
}
