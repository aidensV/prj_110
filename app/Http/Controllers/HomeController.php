<?php

namespace App\Http\Controllers;

use App\m_lkps;
use App\Models\m_led;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $led = m_led::count();
        $user = User::count();
        $lkps = m_lkps::count();
        
        return view('home',compact('led','user','lkps'));
    }
}
