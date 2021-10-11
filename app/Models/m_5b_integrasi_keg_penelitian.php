<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_5b_integrasi_keg_penelitian extends Model
{
    protected $table='5b_integrasi_keg_penelitian';
    protected $fillable=[
        'judul_penelitian',
        'nama_dosen',
        'mata_kuliah',
        'bentuk_integrasi',
        'tahun',
        'prodi_id'
    ];
}
