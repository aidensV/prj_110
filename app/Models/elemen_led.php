<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\elemen_led_detail;

class elemen_led extends Model
{
    protected $table='elemen_led';
    protected $fillable=[
        'kriteria',
    ];
    public function detail(){
        return $this->belongsToMany(elemen_led_detail::class);
    }

}