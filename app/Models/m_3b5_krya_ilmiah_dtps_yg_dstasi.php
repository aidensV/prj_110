<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_3b5_krya_ilmiah_dtps_yg_dstasi extends Model
{
    protected $table='3b5_krya_ilmiah_dtps_yg_dstasi';
    protected $fillable=[
        'nama_dosen',
        'judul_artikel_yang_disitasi',
        'jumlah_sitasi', 
        'prodi_id' 
    ];   
}
