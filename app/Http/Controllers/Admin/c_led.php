<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_led\Store_m_led_Request;
use App\Http\Requests\m_led\Update_m_led_Request;
use App\Models\m_led;
use App\Models\elemen_led;
use App\User;
use Illuminate\Support\Facades\Auth;
use PDO;

class c_led extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        $m_led = [];
        if($request->prodi_id){
            $m_led = m_led::where('prodi_id',$request->prodi_id)->with('elementLed')->get();
        }
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::all();
        }

        return view('admin.m_led.index', compact('m_led','user'));
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
        $get_file = $request->file('penjelasan');
		$file_name = time()."_".$get_file->getClientOriginalName();
		$upload_to = 'file_record/';
        $get_file->move($upload_to,$file_name);
        $m_led = m_led::create([
            'elemen_led'    =>$request->elemen_led,
            'ket'      =>$request->ket,
            'penjelasan'    =>$file_name,
            'nilai'    =>$request->nilai,
            'prodi_id'    =>$request->prodi_id,
        ]);
        $notification = array(
            'message' => 'LED Berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->to('admin/r_led?prodi_id='.$request->prodi_id)->with($notification);
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
        $m_led->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/r_led?prodi_id='.$m_led->prodi_id)->with($notification);
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
