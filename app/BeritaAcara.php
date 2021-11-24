<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    protected $table = 'berita_acara';

    public function pengelola()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
