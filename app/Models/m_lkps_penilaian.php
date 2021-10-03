<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_lkps_penilaian extends Model
{
    protected $table='lkps_penilaian';
    protected $fillable=[
        'elemen_lkps_id',
        'skor',
    ];
}