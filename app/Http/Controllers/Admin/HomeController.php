<?php

namespace App\Http\Controllers\Admin;

use App\m_lkps;
use App\Models\m_led;
use App\User;

class HomeController
{
    public function index()
    {
        $led = m_led::count();
        $user = User::count();
        $lkps = m_lkps::count();
        return view('home',compact('user','led','lkps'))->with(['title'=>'Beranda',]);
    }
}
