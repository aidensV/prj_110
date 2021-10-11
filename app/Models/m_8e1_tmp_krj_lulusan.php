<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8e1_tmp_krj_lulusan extends Model
{
    protected $table='8e1_tmp_krj_lulusan';
    protected $fillable=[
        'tahun_lulus',
        'jmlh_lulusan',
        'jmlh_lulusan_terlacak',
        'jmlh_lulusan_terlacak_lokal',
        'jmlh_lulusan_terlacak_nasional',
        'jmlh_lulusan_terlacak_internasional',
        'prodi_id'
    ];
}
