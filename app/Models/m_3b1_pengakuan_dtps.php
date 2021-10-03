<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b1_pengakuan_dtps extends Model
{
    protected $table='3b1_pengakuan_dtps';
    protected $fillable=[
        'nama_dosen',
        'bidang_keahlian',
        'rekognisi_dan_bukti_pendukung',
        'tingkat_internasional',
        'tingkat_nasional',
        'tingkat_wilayah',
        'tahun',     
    ];
}
