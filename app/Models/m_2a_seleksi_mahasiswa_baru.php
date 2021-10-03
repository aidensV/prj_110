<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_2a_seleksi_mahasiswa_baru extends Model
{
    protected $table='2a_seleksi_mahasiswa_baru';
    protected $fillable=[
        'tahun_akademik',
        'daya_tampung',
        'jmlh_calon_mhs_pendftr',
        'jmlh_calon_mhs_lulus_seleksi',
        'jmlh_mhs_baru_reg',
        'jmlh_mhs_baru_trf',
        'jmlh_mhs_aktif_reg',
        'jmlh_mhs_aktif_trf',
    ];
}
