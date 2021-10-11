<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_5a_kurikulum_capaian_pmbljrn extends Model
{
    protected $table='5a_kurikulum_capaian_pmbljrn';
    protected $fillable=[
        'semester',
        'kode_matkul',
        'nama_matkul',
        'matkul_kompetensi',
        'bobot_kredit_kuliah',
        'bobot_kredit_seminar',
        'bobot_kredit_praktikum',
        'konversi_kredit_ke_jam',
        'capaian_pembelajaran_sikap',
        'capaian_pembelajaran_pengetahuan',
        'capaian_pembelajaran_keterampilan_umum',
        'capaian_pembelajaran_keterampilan_khusus',
        'dokummen_rencana_pembelajaran',
        'unit_penyelenggara',
        'prodi_id'
    ];
}
