<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_5c_kepuasan_mahasiswa extends Model
{
    protected $table='5c_kepuasan_mahasiswa';
    protected $fillable=[
        'aspek_yang_diukur',
        'tingkat_kepuasan_mahasiswa_sangat_baik',
        'tingkat_kepuasan_mahasiswa_baik',
        'tingkat_kepuasan_mahasiswa_cukup',
        'tingkat_kepuasan_mahasiswa_kurang',
        'rencana_tidak_lanjut_oleh_upps',
    ];
}
