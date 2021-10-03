<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_penilaian extends Model
{
    protected $table='penilaian';
    protected $fillable=[
        'kategori_strata',
        'nilai_asesmen',
        'sp_terakreditasi',
        'sp_unggul',
        'sp_baik_sekali',
    ];
}
