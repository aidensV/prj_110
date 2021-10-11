<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_7_pkm_dtps_yg_melibatkan_mhs extends Model
{
    protected $table='7_pkm_dtps_yg_melibatkan_mhs';
    protected $fillable=[
        'nama_dosen',
        'tema_penelitian_sesuai_roadmap',
        'nama_mahasiswa',
        'judul_kegiatan',
        'tahun',
        'prodi_id'
    ];
}
