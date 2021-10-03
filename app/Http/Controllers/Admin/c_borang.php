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
use Illuminate\Support\Facades\Auth;
use PDF;
class c_borang extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        
        $m_borang = m_borang::where('prodi_id',$request->prodi_id)->get();
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::all();
        }
        return view('admin.m_borang.index', compact('m_borang','user'));
    }

    public function create(Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodi_id = $request->prodi_id;
        $prodi_name = $request->prodi_name;
        
        return view('admin.m_borang.create',compact('prodi_id','prodi_name'));
    }

    public function store(Store_m_borang_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        
        $m_borang = new m_borang;
        $m_borang->elemen = $request->elemen;
        $m_borang->prodi_id = $request->prodi_id;
        $m_borang->no_stndr = $request->no_stndr;
        $m_borang->skor_PS = $request->skor_PS;
        $m_borang->skor_auditor = $request->skor_auditor;
        $m_borang->ket = $request->ket;
        $m_borang->stnd_unila = $request->stnd_unila;
        $m_borang->bobot = $request->bobot;
        $m_borang->persen = $request->persen;
        $m_borang->kinerja = $request->kinerja;
        $m_borang->catatan = $request->catatan;
        $m_borang->save();

        foreach ($request->indi_penilai as $key => $value) {
            
            $borangNilai = new borang_indicator_nilai();
            $borangNilai->id_indicator = $value;
            $borangNilai->id_borang = $m_borang->id;
            $borangNilai->type = $request->tipe;
            $borangNilai->save();
        }
        return redirect()->to('admin/r_borang?prodi_id='.$request->prodi_id);
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_borang = m_borang::with('indikator')->find($id);
        $data_detail = [];
        foreach ($m_borang->indikator as $key => $value) {
            if($value->type == 'lkps'){
                $idIndicator = $value->id_indicator;
                $name = m_lkps::where('id',$idIndicator)->value('name');
                array_push($data_detail,$name);
            }
        }
        return view('admin.m_borang.edit', compact('m_borang'))->with(['data_detail' => $data_detail]);
    }

    public function update(Update_m_borang_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
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
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_borang = m_borang::with('indikator')->find($id);
        $data_detail = [];
        foreach ($m_borang->indikator as $key => $value) {
            if($value->type == 'lkps'){
                $idIndicator = $value->id_indicator;
                $name = m_lkps::where('id',$idIndicator)->value('name');
                array_push($data_detail,$name);
            }
        }
        // return $m_borang;
        return view('admin.m_borang.show', compact('m_borang'))->with(['data_detail' => $data_detail]);
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
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
        foreach ($m_borang as $key => $value) {
            if(isset($value->indikator)){
                foreach ($value->indikator as $key2 => $indikator) {
                    if($indikator->type == 'lkps' ){
                        $indikator['name'] = m_lkps::where('id',$indikator->id_indicator)->value('name');
                    }else{
                        $indikator['name'] = m_led::where('id',$indikator->id_indicator)->value('ket');
                    }
                }
            }
           
        }
        $user= User::where('id',$request->prodi_id)->first();
        $pdf = PDF::loadView('exports.borang', ['m_borang' => $m_borang,'user' => $user]);
        return $pdf->download('borang.pdf');
    }
}
