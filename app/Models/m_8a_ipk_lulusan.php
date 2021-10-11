<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8a_ipk_lulusan extends Model
{
    protected $table='8a_ipk_lulusan';
    protected $fillable=[
        'tahun_lulus',
        'jumlah_lulusan',
        'ipk_min',
        'ipk_rata_rata',
        'ipk_maks',
        'prodi_id'
    ];
}
