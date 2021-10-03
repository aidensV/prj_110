<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8cMasaStudiLulusanMagister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8c_masastudi_llsn_mgr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thn_msk');
            $table->integer('jmlh_mhs_diterima');
            $table->integer('jmlh_mhs_lulus_ts3');
            $table->integer('jmlh_mhs_lulus_ts2');
            $table->integer('jmlh_mhs_lulus_ts1');
            $table->integer('jmlh_mhs_lulus_ts');
            $table->integer('jmlh_lulusan_akhir_ts');
            $table->integer('rata_masa_studi');
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
        Schema::dropIfExists('8c_masa_studi_lulusan_magister');
    }
}
