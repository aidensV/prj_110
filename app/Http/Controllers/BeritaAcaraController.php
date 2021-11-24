<?php

namespace App\Http\Controllers;

use App\BeritaAcara;
use App\Models\m_borang;
use App\User;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaAcaraController extends Controller
{
    public function index(Request $request)
    {
        $m_led = [];
        $elementBorang = [];
        if ($request->prodi_id) {

            $elementBorang = m_borang::where('prodi_id', $request->prodi_id)->get();
        }

        if (isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff') {
            $user = User::where('id', Auth::user()->id)->get();
        } else {
            $user = User::whereHas('roles', function ($q) {
                $q->where('title', 'Staff');
            })->with('roles')->get();
        }

        $berita =  BeritaAcara::whereBetWeen('tanggal', [Carbon::parse($request->start_date)->startOfDay(), Carbon::parse($request->end_date)->endOfDay()])->get();
        return view('admin.berita_acara.index', compact('user', 'elementBorang', 'berita'));
    }

    public function create(Request $request)
    {
        $m_led = [];
        $elementBorang = [];
        $berita =[];
        if ($request->prodi_id) {

            $elementBorang = m_borang::where('prodi_id', $request->prodi_id)->get();
            $berita =  BeritaAcara::where('user_id', $request->prodi_id)->first();
        }

        if (isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff') {
            $user = User::where('id', Auth::user()->id)->get();
        } else {
            $user = User::whereHas('roles', function ($q) {
                $q->where('title', 'Staff');
            })->with('roles')->get();
        }
        return view('admin.berita_acara.create', compact('user', 'elementBorang', 'berita'));
    }

    public function store(Request $request)
    {

        $beritaAcara = new BeritaAcara();
        $beritaAcara->tanggal = $request->date;
        $beritaAcara->user_id = $request->user_id;
        $beritaAcara->nilai = $request->nilai;
        $beritaAcara->persen = $request->persen;
        $beritaAcara->catatan = $request->catatan;
        $beritaAcara->rekomendasi = $request->rekomendasi;
        $beritaAcara->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $beritaAcara = BeritaAcara::find($id);
        $beritaAcara->delete();
        return back();
    }

    public function print($id)
    {
        $berita = BeritaAcara::with('pengelola')->where('user_id', $id)->first();
        if ($berita) {
            $borang = m_borang::where('prodi_id', $berita->user_id)->get();
            // return view('admin.berita_acara.print',compact('borang','berita'));
            $pdf = PDF::loadView('admin.berita_acara.print', ['borang' => $borang, 'berita' => $berita]);
            return $pdf->download('print');
        }else{
            return back();
        }

    }
}
