<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3a5_dosen_industri extends Model
{
    protected $table='3a5_dosen_industri';
    protected $fillable=[
        'nama_dosen_industri',
        'nidk',
        'perusahaan',
        'pendidikan_tertinggi',
        'bidang_keahlian',
        'sertifikat_profesi',
        'mata_kuliah',
        'bobot_kredit',
        'prodi_id'     
    ];
}
