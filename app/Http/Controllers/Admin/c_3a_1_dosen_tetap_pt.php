<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3a_1_dosen_tetap_pt\Store_m_3a_1_dosen_tetap_pt_Request;
use App\Http\Requests\m_3a_1_dosen_tetap_pt\Update_m_3a_1_dosen_tetap_pt_Request;
use App\m_lkps;
use App\Models\m_3a_1_dosen_tetap_pt;
use Illuminate\Support\Facades\Session;

class c_3a_1_dosen_tetap_pt extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::all();

        return view('admin.m_3a_1_dosen_tetap_pt.index', compact('m_3a_1_dosen_tetap_pt'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3a_1_dosen_tetap_pt.create');
    }

    public function store(Store_m_3a_1_dosen_tetap_pt_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::create($request->all());
        $lkps = m_lkps::where('id',6)->first();
        $lkps->dosenTetepaPT()->save($m_3a_1_dosen_tetap_pt);
        return redirect()->route('admin.r_3a_1_dosen_tetap_pt.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::find($id);
        // return $m_3a_1_dosen_tetap_pt->id;
        return view('admin.m_3a_1_dosen_tetap_pt.edit', compact('m_3a_1_dosen_tetap_pt'));
    }

    public function update(Update_m_3a_1_dosen_tetap_pt_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::find($id);
        $m_3a_1_dosen_tetap_pt->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3a_1_dosen_tetap_pt.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::find($id);
        // return $m_3a_1_dosen_tetap_pt;
        return view('admin.m_3a_1_dosen_tetap_pt.show', compact('m_3a_1_dosen_tetap_pt'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_3a_1_dosen_tetap_pt = m_3a_1_dosen_tetap_pt::find($id);
            $m_3a_1_dosen_tetap_pt->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_3a_1_dosen_tetap_pt_Request $request)
    {
        m_3a_1_dosen_tetap_pt::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
