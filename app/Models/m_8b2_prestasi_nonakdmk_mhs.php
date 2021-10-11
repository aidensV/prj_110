<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8b2_prestasi_nonakdmk_mhs extends Model
{
    protected $table='8b2_prestasi_nonakdmk_mhs';
    protected $fillable=[
        'nama_kegiatan',
        'waktu_perolehan',
        'tingkat_lokal',
        'tingkat_nasional',
        'tingkat_internasional',
        'prestasi_yang_dicapai',
        'prodi_id'
    ];
}
