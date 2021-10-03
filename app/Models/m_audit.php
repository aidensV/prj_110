<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_audit extends Model
{
    protected $table='audit';
    protected $fillable=[
        'prodi_id',
        'auditor_id',
        'tgl_mulai',
        'tgl_selesai',
    ];
}
