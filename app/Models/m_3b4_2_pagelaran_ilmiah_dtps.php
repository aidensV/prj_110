<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b4_2_pagelaran_ilmiah_dtps extends Model
{
    protected $table='3b4_2_pagelaran_ilmiah_dtps';
    protected $fillable=[
        'jenis_publikasi',
        'jmlh_judul_ts2',
        'jmlh_judul_ts1',
        'jmlh_judul_ts',
        'jumlah',  
    ];   
}
