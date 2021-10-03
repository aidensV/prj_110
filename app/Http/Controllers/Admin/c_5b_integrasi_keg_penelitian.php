<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_5b_integrasi_keg_penelitian\Store_m_5b_integrasi_keg_penelitian_Request;
use App\Http\Requests\m_5b_integrasi_keg_penelitian\Update_m_5b_integrasi_keg_penelitian_Request;
use App\Models\m_5b_integrasi_keg_penelitian;

class c_5b_integrasi_keg_penelitian extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::all();

        return view('admin.m_5b_integrasi_keg_penelitian.index', compact('m_5b_integrasi_keg_penelitian'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_5b_integrasi_keg_penelitian.create');
    }

    public function store(Store_m_5b_integrasi_keg_penelitian_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::create($request->all());

        return redirect()->route('admin.r_5b_integrasi_keg_penelitian.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::find($id);

        return view('admin.m_5b_integrasi_keg_penelitian.edit', compact('m_5b_integrasi_keg_penelitian'));
    }

    public function update(Update_m_5b_integrasi_keg_penelitian_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::find($id);
        $m_5b_integrasi_keg_penelitian->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_5b_integrasi_keg_penelitian.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::find($id);
        return view('admin.m_5b_integrasi_keg_penelitian.show', compact('m_5b_integrasi_keg_penelitian'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_5b_integrasi_keg_penelitian = m_5b_integrasi_keg_penelitian::find($id);
        $m_5b_integrasi_keg_penelitian->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_5b_integrasi_keg_penelitian_Request $request)
    {
        m_5b_integrasi_keg_penelitian::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
