<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b2_penelitian_dtps extends Model
{
    protected $table='3b2_penelitian_dtps';
    protected $fillable=[
        'sumber_pembiayaan',
        'jumlah_judul_penelitian_ts2',
        'jumlah_judul_penelitian_ts1',
        'jumlah_judul_penelitian_ts',
        'jumlah',
    ];
}
