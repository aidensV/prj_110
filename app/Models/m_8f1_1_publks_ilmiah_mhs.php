<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8f1_1_publks_ilmiah_mhs extends Model
{
    protected $table='8f1_1_publks_ilmiah_mhs';
    protected $fillable=[
        'jenis_publikasi',
        'jumlah_judul_ts2',
        'jumlah_judul_ts1',
        'jumlah_judul_ts',
        'jumlah',
        'prodi_id'
    ];
}
