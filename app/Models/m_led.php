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
        'nilai'
    ];
}
