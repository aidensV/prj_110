<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3a_3_ewmp_dosen_tetap_pt extends Model
{
    protected $table='3a_3_ewmp_dosen_tetap_pt';
    protected $fillable=[
        'nama_dosen',
        'dtps',
        'ps_diakreditasi',
        'ps_lain_dalam_pt',
        'ps_lain_luar_pt',
        'penelitian',
        'pkm',
        'tugas_tambahan_penunjang',
        'jumlah',
        'rata_per_semester',
    ];
}
