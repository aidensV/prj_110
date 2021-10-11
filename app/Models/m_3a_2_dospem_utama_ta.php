<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3a_2_dospem_utama_ta extends Model
{
    protected $table='3a_2_dospem_utama_ta';
    protected $fillable=[
        'id',
        'nama_dosen',
        'ps_diakreditasi_ts2',
        'ps_diakreditasi_ts1',
        'ps_diakreditasi_ts',
        'ps_lain_ts2',
        'ps_lain_ts1',
        'ps_lain_ts',
        'rata_jmlh_bimbingan',
        'prodi_id'
    ];
}
