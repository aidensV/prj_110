<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b3_pkm_dtps extends Model
{
    protected $table='3b3_pkm_dtps';
    protected $fillable=[
        'sumber_pembiayaan',
        'jmlh_judul_pkm_ts2',
        'jmlh_judul_pkm_ts1',
        'jmlh_judul_pkm_ts',
        'jumlah',
    ];   
}
