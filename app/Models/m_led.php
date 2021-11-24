<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_led extends Model
{
    protected $table='led';
    protected $fillable=[
        'elemen_led',
        'ket',
        'penjelasan',
        'nilai',
        'tanggal',
        'prodi_id',
        'strata'
    ];

    public function elementLed()
    {
        return $this->belongsTo(elemen_led::class,'elemen_led');
    }
}
