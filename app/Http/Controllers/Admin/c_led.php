<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_led\Store_m_led_Request;
use App\Http\Requests\m_led\Update_m_led_Request;
use App\Models\m_led;
use App\Models\elemen_led;
use App\Models\m_borang;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDO;

class c_led extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        session(['strata' => $request->s]);
        
        $m_led = [];
        $elementBorang = [];
        $startDate = Carbon::now()->format('Y');
        $endDate = Carbon::now()->addYear(10)->format('Y');

        if($request->start_date){
            $startDate = Carbon::createFromFormat('Y',$request->start_date)->format('Y');
        }
        if($request->end_date){
            $endDate = Carbon::createFromFormat('Y',$request->end_date)->format('Y');
        }
            $m_led = m_led::with('elementLed');
            if($request->prodi_id){
                if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title != 'Staff'){
                $m_led = $m_led->where('prodi_id',$request->prodi_id);
                }
            }
            if($request->s){
                $m_led = $m_led->where('strata',$request->s);
            }
            $m_led = $m_led->whereBetWeen('tanggal',[$startDate,$endDate])
            ->get();
            $elementBorang = m_borang::where('prodi_id',$request->prodi_id)->get();
        
        
        // if($request->element_id){
        //     $m_led = m_led::where('prodi_id',$request->prodi_id)->where('strata',$request->s)->where('element_id',$request->element_id)->with('elementLed')
        //     ->whereBetWeen('created_at',[Carbon::parse($request->start_date)->startOfDay(),Carbon::parse($request->end_date)->endOfDay()])
        //     ->get();
        //     session(['borang_id' => $request->borang_id]);
        // }
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            
            $user= User::whereHas('roles',function($q){
                $q->where('title','Staff');
            })->with('roles')->get();
        }

        return view('admin.m_led.index', compact('m_led','user','elementBorang'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $elemen_led = elemen_led::pluck('kriteria','id');
        
        // return $elemen_led;
        return view('admin.m_led.create',compact('elemen_led'));
    }

    public function store(Store_m_led_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        // check data
        $led = m_led::where('elemen_led',$request->elemen_led)->where('prodi_id',$request->prodi_id)->exists();
        if($led){
            $notification = array(
                'message' => 'Data elemen sudah ada',
                'alert-type' => 'warning',
            );
            return back()->with($notification);
        }
        $file_name = '';
        if($request->hasFile('penjelasan')){
            $get_file = $request->file('penjelasan');
            $file_name = time()."_".$get_file->getClientOriginalName();
            $upload_to = 'file_record/';
            $get_file->move($upload_to,$file_name);
        }
        
        $strata = session()->get('strata');
        $m_led = m_led::create([
            'elemen_led'    =>$request->elemen_led,
            'ket'      =>$request->ket ?? '',
            'penjelasan'    =>$file_name,
            'tanggal'    =>$request->tanggal,
            'nilai'    =>$request->nilai,
            'strata'    => $strata,
            'prodi_id'    =>$request->prodi_id,
        ]);
        $notification = array(
            'message' => 'LED Berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->to('admin/r_led?s='.$strata.'&prodi_id='.$request->prodi_id)->with($notification);
        // return $upload_to;
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_led = m_led::find($id);
        $elemen_led = elemen_led::pluck('kriteria','id');
        return view('admin.m_led.edit', compact('m_led','elemen_led'));
    }

    public function update(Update_m_led_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_led = m_led::find($id);
        $file_name = '';
        if($request->hasFile('penjelasan')){
            $get_file = $request->file('penjelasan');
            $file_name = time()."_".$get_file->getClientOriginalName();
            $upload_to = 'file_record/';
            $get_file->move($upload_to,$file_name);
        }
        $m_led->update([
            'elemen_led'    =>$request->elemen_led,
            'ket'      =>$request->ket ?? '',
            'penjelasan'    =>$file_name,
            
            'nilai'    =>$request->nilai,
        ]);
        $strata = session()->get('strata');
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/r_led?s='.$strata.'&prodi_id='.$request->prodi_id)->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_led = m_led::find($id);
        return view('admin.m_led.show', compact('m_led'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_led = m_led::find($id);
        $m_led->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_led_Request $request)
    {
        m_led::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function changeValue(Request $request)
    {
        $led = m_led::where('id',$request->id)->first();
        if($led){
            $led->nilai = $request->nilai;
            $led->update();
            return response()->json(200);
        }else{
            return response()->json(400);
        }
    }
}
