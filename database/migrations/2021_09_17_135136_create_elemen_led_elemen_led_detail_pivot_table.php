<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElemenLedElemenLedDetailPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elemen_led_elemen_led_detail', function (Blueprint $table) {
            $table->unsignedInteger('elemen_led_id');
            $table->foreign('elemen_led_id')->references('id')->on('elemen_led');
            $table->unsignedInteger('elemen_led_detail_id');
            $table->foreign('elemen_led_detail_id')->references('id')->on('elemen_led_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elemen_led_elemen_led_detail_pivot');
    }
}
