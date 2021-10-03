<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8b1_prestasi_akdmk_mhs extends Model
{
    protected $table='8b1_prestasi_akdmk_mhs';
    protected $fillable=[
        'nama_kegiatan',
        'waktu_perolehan',
        'tingkat_lokal',
        'tingkat_nasional',
        'tingkat_internasional',
        'prestasi_yang_dicapai',
    ];
}
