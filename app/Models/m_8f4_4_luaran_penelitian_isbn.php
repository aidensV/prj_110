<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8f4_4_luaran_penelitian_isbn extends Model
{
    protected $table='8f4_4_luaran_penelitian_isbn';
    protected $fillable=[
        'luaran_penelitian_dan_pkm',
        'tahun',
        'keterangan',
        'prodi_id'
    ];
}
