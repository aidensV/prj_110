<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_2b_mahasiswa_asing extends Model
{
    protected $table='2b_mahasiswa_asing';
    protected $fillable=[
        'program_studi',
        'jml_mhs_aktif_ts2',
        'jml_mhs_aktif_ts1',
        'jml_mhs_aktif_ts',
        'jml_mhs_asing_fulltime_ts2',
        'jml_mhs_asing_fulltime_ts1',
        'jml_mhs_asing_fulltime_ts',
        'jml_mhs_asing_parttime_ts2',
        'jml_mhs_asing_parttime_ts1',
        'jml_mhs_asing_parttime_ts',
        'prodi_id'
    ];
}
