<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8d1_wkt_llsn_dip extends Model
{
    protected $table='8d1_wkt_llsn_dip';
    protected $fillable=[
        'thn_lulusan',
        'jmlh_lulusan',
        'jmlh_lulusan_terlacak',
        'jmlh_lulusan_dipesan_sblm_lulus',
        'jmlh_lulusan_pekerjaan_wt_krg3bln',
        'jmlh_lulusan_pekerjaan_wt_3blnsmp6bln',
        'jmlh_lulusan_pekerjaan_wt_lbh6bln',
        'prodi_id'
    ];
}
