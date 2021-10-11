<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3a_2_dospem_utama_ta\Store_m_3a_2_dospem_utama_ta_Request;
use App\Http\Requests\m_3a_2_dospem_utama_ta\Update_m_3a_2_dospem_utama_ta_Request;
use App\m_lkps;
use App\Models\m_3a_2_dospem_utama_ta;
use Illuminate\Support\Facades\Session;

class c_3a_2_dospem_utama_ta extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::all();

        return view('admin.m_3a_2_dospem_utama_ta.index', compact('m_3a_2_dospem_utama_ta'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3a_2_dospem_utama_ta.create');
    }

    public function store(Store_m_3a_2_dospem_utama_ta_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::create($request->all());
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $lkps = m_lkps::where('id',7)->first();
        $lkps->dosePemUtama()->save($m_3a_2_dospem_utama_ta);
        return redirect()->route('admin.r_3a_2_dospem_utama_ta.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::find($id);
        // return $m_3a_2_dospem_utama_ta->id;
        return view('admin.m_3a_2_dospem_utama_ta.edit', compact('m_3a_2_dospem_utama_ta'));
    }

    public function update(Update_m_3a_2_dospem_utama_ta_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::find($id);
        $m_3a_2_dospem_utama_ta->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3a_2_dospem_utama_ta.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::find($id);
        // return $m_3a_2_dospem_utama_ta;
        return view('admin.m_3a_2_dospem_utama_ta.show', compact('m_3a_2_dospem_utama_ta'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_3a_2_dospem_utama_ta = m_3a_2_dospem_utama_ta::find($id);
            $m_3a_2_dospem_utama_ta->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_3a_2_dospem_utama_ta_Request $request)
    {
        m_3a_2_dospem_utama_ta::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
