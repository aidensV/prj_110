<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3a_1_dosen_tetap_pt extends Model
{
    protected $table='3a_1_dosen_tetap_pt';
    protected $fillable=[
        'nama_dosen',
        'nidn_nidk',
        'psc_srjn_m_mt_sp',
        'psc_srjn_d_dt_sp',
        'bidang_keahlian',
        'kssn_komptn_inti_ps',
        'jabatan_akademik',
        'serti_pendidik_pro',
        'serti_komptnsi_profesi_indstr',
        'matkul_ps_akreditasi',
        'kssn_bdg_keahlian_dg_matkul',
        'matkul_ps_lain',
    ];
}
