<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8c_masastudi_llsn_mgr extends Model
{
    protected $table='8c_masastudi_llsn_mgr';
    protected $fillable=[
        'thn_msk',
        'jml_mhs_diterima',
        'jml_mhs_lulus_ts3',
        'jml_mhs_lulus_ts2',
        'jml_mhs_lulus_ts1',
        'jml_mhs_lulus_ts',
        'jml_lulusan_akhir_ts',
        'rata_masa_studi',
    ];
}
