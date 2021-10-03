<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create4PenggunaanDana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('4_penggunaan_dana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_penggunaan');
            $table->integer('upps_ts2');
            $table->integer('upps_ts1');
            $table->integer('upps_ts');
            $table->integer('upps_rata');
            $table->integer('ps_ts2');
            $table->integer('ps_ts1');
            $table->integer('ps_ts');
            $table->integer('ps_rata');
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
        Schema::dropIfExists('4_penggunaan_dana');
    }
}
