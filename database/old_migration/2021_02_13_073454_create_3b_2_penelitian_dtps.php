<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3b2PenelitianDtps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3b_2_penelitian_dtps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sumber_pembiayaan');
            $table->integer('jmlh_judul_penelitian_ts2');
            $table->integer('jmlh_judul_penelitian_ts1');
            $table->integer('jmlh_judul_penelitian_ts');
            $table->integer('jmlh');
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
        Schema::dropIfExists('3b_2_penelitian_dtps');
    }
}
