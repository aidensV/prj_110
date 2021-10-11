<?php

namespace App\Models;

use App\borang_indicator_nilai;
use Illuminate\Database\Eloquent\Model;

class m_borang extends Model
{
    protected $table='borang';
    protected $fillable=[
        'elemen',
        'no_stndr',
        'skor_PS',
        'skor_auditor',
        'ket',
        'stnd_unila',
        'bobot_sumber',
        'bobot_ami',
        'kinerja',
        'capaian',
        'catatan',
    ];

    public function indikator()
    {
        return $this->hasMany(borang_indicator_nilai::class,'id_borang');
    }
}
