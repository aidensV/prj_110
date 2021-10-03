<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_8f3_produk_dtps_mhs extends Model
{
    protected $table='8f3_produk_dtps_mhs';
    protected $fillable=[
        'nama_mahasiswa',
        'nama_produk',
        'deskripsi_produk',
        'bukti',
        'tahun',
    ];
}
