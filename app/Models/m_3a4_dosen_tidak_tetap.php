<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3a4_dosen_tidak_tetap extends Model
{
    protected $table='3a4_dosen_tidak_tetap';
    protected $fillable=[
        'nama_dosen',
        'nidn_nidk',
        'pendidikan_pasca_sarjana',
        'bidang_keahlian',
        'jabatan_akademik',
        'sertifikat_pendidik_profesional',
        'sertifikat_kompetensi_profesi_industri',
        'matkul_ps_akreditasi',
        'kesesuaian_dengan_matkul',     
    ];
}
