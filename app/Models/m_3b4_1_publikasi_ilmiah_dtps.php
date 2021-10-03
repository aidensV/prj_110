<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b4_1_publikasi_ilmiah_dtps extends Model
{
    protected $table='3b4_1_publikasi_ilmiah_dtps';
    protected $fillable=[
        'jenis_publikasi',
        'jumlah_judul_ts2',
        'jumlah_judul_ts1',
        'jumlah_judul_ts',
        'jumlah',  
    ];   
}
