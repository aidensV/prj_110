<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3a4_dosen_tidak_tetap\Store_m_3a4_dosen_tidak_tetap_Request;
use App\Http\Requests\m_3a4_dosen_tidak_tetap\Update_m_3a4_dosen_tidak_tetap_Request;
use App\m_lkps;
use App\Models\m_3a4_dosen_tidak_tetap;

class c_3a4_dosen_tidak_tetap extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::all();

        return view('admin.m_3a4_dosen_tidak_tetap.index', compact('m_3a4_dosen_tidak_tetap'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3a4_dosen_tidak_tetap.create');
    }

    public function store(Store_m_3a4_dosen_tidak_tetap_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::create($request->all());
        $lkps = m_lkps::where('id',9)->first();
        $lkps->dosenTidakTeteap()->save($m_3a4_dosen_tidak_tetap);
        return redirect()->route('admin.r_3a4_dosen_tidak_tetap.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::find($id);

        return view('admin.m_3a4_dosen_tidak_tetap.edit', compact('m_3a4_dosen_tidak_tetap'));
    }

    public function update(Update_m_3a4_dosen_tidak_tetap_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::find($id);
        $m_3a4_dosen_tidak_tetap->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3a4_dosen_tidak_tetap.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::find($id);
        return view('admin.m_3a4_dosen_tidak_tetap.show', compact('m_3a4_dosen_tidak_tetap'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3a4_dosen_tidak_tetap = m_3a4_dosen_tidak_tetap::find($id);
        $m_3a4_dosen_tidak_tetap->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3a4_dosen_tidak_tetap_Request $request)
    {
        m_3a4_dosen_tidak_tetap::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
