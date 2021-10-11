<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8e2_kepuasan_pgn_llsn extends Model
{
    protected $table='8e2_kepuasan_pgn_llsn';
    protected $fillable=[
        'jenis_kemampuan',
        'tingkat_kep_peng_sb',
        'tingkat_kep_peng_b',
        'tingkat_kep_peng_c',
        'tingkat_kep_peng_k',
        'rcn_tdk_lanjut_oleh_upps',
        'prodi_id'
    ];
}
