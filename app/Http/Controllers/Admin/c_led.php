<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_led\Store_m_led_Request;
use App\Http\Requests\m_led\Update_m_led_Request;
use App\Models\m_led;
use App\Models\elemen_led;

class c_led extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_led = m_led::all();

        return view('admin.m_led.index', compact('m_led'));
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

        $get_file = $request->file('penjelasan');
		$file_name = time()."_".$get_file->getClientOriginalName();
		$upload_to = 'file_record/';
        $get_file->move($upload_to,$file_name);
        $m_led = m_led::create([
            'elemen_led'    =>$request->elemen_led,
            'ket'      =>$request->ket,
            'penjelasan'    =>$file_name,
            'nilai'    =>$request->nilai,
        ]);
        $notification = array(
            'message' => 'LED Berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.r_led.index')->with($notification);
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
        return redirect()->route('admin.r_led.index')->with
        ($notification);
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
}
