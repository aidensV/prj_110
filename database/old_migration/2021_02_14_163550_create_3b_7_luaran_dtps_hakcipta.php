<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b7LuaranDtpsHakcipta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b_7_luaran_dtps_hakcipta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('luaran_penelitian');
            $table->integer('tahun');
            $table->string('keterangan');
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
        Schema::dropIfExists('3b_7_luaran_dtps_hakcipta');
    }
}
