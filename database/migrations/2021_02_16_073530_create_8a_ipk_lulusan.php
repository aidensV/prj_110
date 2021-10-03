<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8aIpkLulusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8a_ipk_lulusan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun_lulus');
            $table->integer('jumlah_lulusan');
            $table->integer('ipk_min');
            $table->integer('ipk_rata_rata');
            $table->integer('ipk_maks');
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
        Schema::dropIfExists('8a_ipk_lulusan');
    }
}
