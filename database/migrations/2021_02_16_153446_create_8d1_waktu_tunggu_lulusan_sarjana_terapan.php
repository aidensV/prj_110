<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create8d1WaktuTungguLulusanSarjanaTerapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('8d1_wkt_llsn_sjter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('thn_lulus');
            $table->integer('jmlh_lulusan');
            $table->integer('jmlh_lulusan_terlacak');
            $table->integer('jmlh_lulusan_wt_krg3bln');
            $table->integer('jmlh_lulusan_wt_3smp6bln');
            $table->integer('jmlh_lulusan_wt_lbh6bln');
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
        Schema::dropIfExists('8d1_waktu_tunggu_lulusan_sarjana_terapan');
    }
}
