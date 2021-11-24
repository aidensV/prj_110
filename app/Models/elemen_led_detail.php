<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class elemen_led_detail extends Model
{
    protected $table='elemen_led_detail';
    protected $fillable=[
        'deskripsi',
        'bobot',
        'strata'
    ];
}