<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\elemen_led\Store_elemen_led_Request;
use App\Http\Requests\elemen_led\Update_elemen_led_Request;
use App\Models\elemen_led;
use App\Models\elemen_led_detail;

class c_elemen_led extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $elemen_led = elemen_led::all();

        return view('admin.elemen_led.index', compact('elemen_led'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.elemen_led.create');
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $elemen_led = elemen_led::create([
            'kriteria' => $request->kriteria,
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
        return redirect()->route('admin.r_elemen_led.index')->with($notification);
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
