<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create3a1DosenTetapPT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('3a_1_dosen_tetap_pt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_dosen');
            $table->integer('nidn_nidk');
            $table->string('psc_srjn_m_mt_sp');
            $table->string('psc_srjn_d_dt_sp');
            $table->string('bidang_keahlian');
            $table->string('kssn_komptn_inti_ps');
            $table->string('jabatan_akademik');
            $table->string('serti_pendidik_pro');
            $table->string('serti_komptnsi_profesi_indstr');
            $table->string('matkul_ps_akreditasi');
            $table->string('kssn_bdg_keahlian_dg_matkul');
            $table->string('matkul_ps_lain');
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
        Schema::dropIfExists('3a_1_dosen_tetap_pt');
    }
}
