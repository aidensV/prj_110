<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_led_penilaian extends Model
{
    protected $table='led_penilaian';
    protected $fillable=[
        'elemen_led_id',
        'bukti_kinerja',
        'skor',
    ];
}
