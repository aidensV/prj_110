<?php

namespace App\Models;

use App\m_lkps;
use Illuminate\Database\Eloquent\Model;

class m_1_1_kerjasama_pendidikan extends Model
{
    protected $table='1_1_kerjasama_pendidikan';
    protected $fillable=[
        'tingkat_internasional',
        'tingkat_nasional',
        'tingkat_wilayah',
        'judul_kegiatan_kerjasama',
        'manfaat_bagi_ps',
        'waktu_dan_durasi',
        'bukti_kerjasama',
        'tahun_berakhirnya_kerjasama',
        'lembaga_mitra',
        'prodi_id'
    ];

    public function lkps()
    {
        return $this->morphToMany(m_lkps::class, 'lkpsables');
    }
}
