<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_4_penggunaan_data extends Model
{
    protected $table='4_penggunaan_data';
    protected $fillable=[
        'jenis_penggunaan',
        'upps_ts2',
        'upps_ts1',
        'upps_ts',
        'program_studi_ts2',
        'program_studi_ts1',
        'program_studi_ts',
        'rata_rata', 
    ]; 
}
