<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_iku extends Model
{
    protected $table='iku';
    protected $fillable=[
        'indikator',
        'jmlh',
    ];
}
