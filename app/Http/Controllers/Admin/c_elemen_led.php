<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\elemen_led\Store_elemen_led_Request;
use App\Http\Requests\elemen_led\Update_elemen_led_Request;
use App\Models\elemen_led;
use App\Models\elemen_led_detail;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class c_elemen_led extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        $start_date = Carbon::now()->subYears(10);
        $end_date = Carbon::now();
        session(['strata' => $request->s]);
        
        if($request->start_date){
            $start_date = $request->start_date;
        }
        if($request->end_date){
            $end_date = $request->end_date;
        }
        
        $elemen_led = elemen_led::whereBetWeen('created_at',[Carbon::parse($request->start_date)->startOfDay(),Carbon::parse($request->end_date)->endOfDay()]);
        
        

        if($request->prodi_id){
            $elemen_led = $elemen_led->where('prodi_id',$request->prodi_id);
        }
        if($request->s){
            $elemen_led = $elemen_led->where('strata',$request->s);
        }
        $elemen_led = $elemen_led->get();

        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::whereHas('roles',function($q){
                $q->where('title','Staff');
            })->with('roles')->get();
        }
        
        return view('admin.elemen_led.index', compact('elemen_led','user'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.elemen_led.create');
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $strata = session()->get('strata');
        $prodi_id = $request->prodi_id;
        $elemen_led = elemen_led::create([
            'kriteria' => $request->kriteria,
            'strata' => $strata,
            'prodi_id' => $prodi_id
        ]);
        $elemen_led_id = array();
        
        for($i=0;$i<sizeof($request->deskripsi);$i++){
            $elemen_led_detail = elemen_led_detail::create([
                'deskripsi'     => $request->deskripsi[$i],
                'bobot'       => $request->bobot[$i],
                
            ]);
            array_push($elemen_led_id,$elemen_led_detail->id);
        }
        for($i=0;$i<sizeof($elemen_led_id);$i++){
            $elemen_led->detail()->sync($elemen_led_id[$i],[]);
        }
        $notification = array(
            'message' => 'Prasyarat Penelitian berhasil ditambahkan!\nSilahkan tambah detail mengajar!',
            'alert-type' => 'success',
            'show' => 'pengabdian',
        );
        // return $prasyarat_mengajar->id;
        return redirect()->to('admin/r_elemen_led/?s='.$strata)->with($notification);
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $elemen_led = elemen_led::find($id);
        // return $elemen_led->id;
        return view('admin.elemen_led.edit', compact('elemen_led'));
    }

    public function update(Update_elemen_led_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $elemen_led = elemen_led::find($id);
        $elemen_led->update($request->all());
        elemen_led_detail::whereIn('id',$request->id_detail)->delete();
        $elemen_led_id = array();
        for($i=0;$i<sizeof($request->deskripsi);$i++){
            $elemen_led_detail = elemen_led_detail::create([
                'deskripsi'     => $request->deskripsi[$i],
                'bobot'       => $request->bobot[$i],
            ]);
            array_push($elemen_led_id,$elemen_led_detail->id);
        }
        for($i=0;$i<sizeof($elemen_led_id);$i++){
            $elemen_led->detail()->sync($elemen_led_id[$i],[]);
        }
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_elemen_led.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $elemen_led = elemen_led::find($id);
        // return $elemen_led;
        return view('admin.elemen_led.show', compact('elemen_led'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $elemen_led = elemen_led::find($id);
            $idDetail = $elemen_led->detail()->pluck('id');
            elemen_led_detail::whereIn('id',$idDetail)->delete();
            $elemen_led->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_elemen_led_Request $request)
    {
        elemen_led::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
