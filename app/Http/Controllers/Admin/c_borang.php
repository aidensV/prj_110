<?php

namespace App\Http\Controllers\Admin;

use App\borang_indicator_nilai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_borang\Store_m_borang_Request;
use App\Http\Requests\m_borang\Update_m_borang_Request;
use App\m_lkps;
use App\Models\m_borang;
use App\Models\m_led;
use App\Models\m_led_penilaian;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;
class c_borang extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('borang_access'), 403);
        session(['strata' => $request->s]);
        $startDate = Carbon::now()->format('Y');
        $endDate = Carbon::now()->addYear(10)->format('Y');

        if($request->start_date){
            $startDate = Carbon::createFromFormat('Y',$request->start_date)->format('Y');
        }
        if($request->end_date){
            $endDate = Carbon::createFromFormat('Y',$request->end_date)->format('Y');
        }
        $m_borang = m_borang::whereBetWeen('tanggal',[$startDate,$endDate]);
        // where('prodi_id',$request->prodi_id)
        
        

        if($request->s){
            $m_borang = $m_borang->where('strata',$request->s);
        }

        $m_borang = $m_borang->get();
        
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            
            $user= User::whereHas('roles',function($q){
                $q->where('title','Staff');
            })->with('roles')->get();
        }
        return view('admin.m_borang.index', compact('m_borang','user'));
    }

    public function create(Request $request)
    {
        // abort_unless(\Gate::allows('borang_create'), 403);
        $m_borang = m_borang::where('prodi_id',$request->prodi_id)->latest()->first();
        
        $prodi_id = $request->prodi_id;
        $prodi_name = $request->prodi_name;
        
        return view('admin.m_borang.create',compact('prodi_id','prodi_name'));
    }

    public function store(Store_m_borang_Request $request)
    {
        // abort_unless(\Gate::allows('borang_create'), 403);
        
        $m_borang = new m_borang;
        $m_borang->elemen = $request->elemen;
        $m_borang->prodi_id = $request->prodi_id;
        $m_borang->no_stndr = $request->no_stndr;
        $m_borang->skor_PS = $request->skor_PS;
        $m_borang->skor_auditor = $request->skor_auditor;
        $m_borang->ket = $request->ket;
        $m_borang->stnd_unila = $request->stnd_unila;
        $m_borang->bobot_sumber = $request->bobot_sumber;
        $m_borang->bobot_ami = $request->bobot_ami;
        $m_borang->capaian = $request->capaian;
        $m_borang->kinerja = $request->kinerja;
        $m_borang->catatan = $request->catatan;
        $m_borang->tanggal = $request->tanggal;
        $m_borang->strata = session()->get('strata');
        $m_borang->save();
        
        foreach ($request->indi_penilai as $key => $value) {    
            
            $borangNilai = new borang_indicator_nilai();
            $borangNilai->value_indicator = $value;
            $borangNilai->id_borang = $m_borang->id;
            $borangNilai->type = $request->tipe;
            $borangNilai->save();
        }
        return redirect()->to('admin/r_borang?prodi_id='.$request->prodi_id);
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('borang_edit'), 403);
        $m_borang = m_borang::with('indikator')->find($id);
       $oldSkor = m_borang::where('elemen',$m_borang->elemen)->where('prodi_id',$m_borang->prodi_id)->latest()->take(2)->get();
       $skor_ps = 0;
       $skor_aud = 0;
       if(count($oldSkor) == 2){
           $skor_aud = $oldSkor[1]->skor_auditor;
           $skor_ps = $oldSkor[1]->skor_PS;
       }
        return view('admin.m_borang.edit', compact('m_borang','skor_ps','skor_aud'));
    }

    public function update(Update_m_borang_Request $request, $id)
    {
        
        abort_unless(\Gate::allows('borang_edit'), 403);
        $m_borang = m_borang::find($id);
        $m_borang->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/r_borang?prodi_id='.$m_borang->prodi_id)->with($notification);
    }

    public function show($id)
    {
        // abort_unless(\Gate::allows('borang_show'), 403);
        $m_borang = m_borang::with('indikator')->find($id);
        // return $m_borang;
        return view('admin.m_borang.show', compact('m_borang'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('borang_delete'), 403);
            $m_borang = m_borang::find($id);
            $m_borang->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_borang_Request $request)
    {
        m_borang::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function getTipeIndicator(Request $request)
    {
        if($request->tipe ==  'lkps'){
            $data = m_lkps::all();
        }else{
            $data = m_led_penilaian::all();
        }
        

        return response()->json($data);
    }

    public function getNilaiIndikator(Request $request)
    {
        $m_borang = m_lkps::where('id',$request->id)->value('nilai');
        return response()->json($m_borang);
    }

    public function exportpdf(Request $request)
    {
        
        $m_borang = m_borang::with('indikator')->where('prodi_id',$request->prodi_id)->get();
       
        $user= User::where('id',$request->prodi_id)->first();
        $pdf = PDF::loadView('exports.borang', ['m_borang' => $m_borang,'user' => $user]);
        return $pdf->download('borang.pdf');
    }
}
