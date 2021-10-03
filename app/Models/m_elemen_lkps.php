<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_elemen_lkps extends Model
{
    protected $table='elemen_lkps';
    protected $fillable=[
        'kriteria',
        'deskripsi',
        'bobot',
        'kode_tabel',
    ];
}