<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lkpsables extends Model
{
    public function lkpsable()
    {
        return $this->morphTo();
    }
}
