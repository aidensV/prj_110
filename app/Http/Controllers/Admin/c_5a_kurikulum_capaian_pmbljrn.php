<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_5a_kurikulum_capaian_pmbljrn\Store_m_5a_kurikulum_capaian_pmbljrn_Request;
use App\Http\Requests\m_5a_kurikulum_capaian_pmbljrn\Update_m_5a_kurikulum_capaian_pmbljrn_Request;
use App\m_lkps;
use App\Models\m_5a_kurikulum_capaian_pmbljrn;
use Illuminate\Support\Facades\Session;

class c_5a_kurikulum_capaian_pmbljrn extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::all();

        return view('admin.m_5a_kurikulum_capaian_pmbljrn.index', compact('m_5a_kurikulum_capaian_pmbljrn'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_5a_kurikulum_capaian_pmbljrn.create');
    }

    public function store(Store_m_5a_kurikulum_capaian_pmbljrn_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::create($request->all());
        $lkps = m_lkps::where('id',23)->first();
        $lkps->kurikulumCapaianPjr()->save($m_5a_kurikulum_capaian_pmbljrn);
        return redirect()->route('admin.r_5a_kurikulum_capaian_pmbljrn.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::find($id);

        return view('admin.m_5a_kurikulum_capaian_pmbljrn.edit', compact('m_5a_kurikulum_capaian_pmbljrn'));
    }

    public function update(Update_m_5a_kurikulum_capaian_pmbljrn_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::find($id);
        $m_5a_kurikulum_capaian_pmbljrn->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_5a_kurikulum_capaian_pmbljrn.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::find($id);
        return view('admin.m_5a_kurikulum_capaian_pmbljrn.show', compact('m_5a_kurikulum_capaian_pmbljrn'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_5a_kurikulum_capaian_pmbljrn = m_5a_kurikulum_capaian_pmbljrn::find($id);
        $m_5a_kurikulum_capaian_pmbljrn->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_5a_kurikulum_capaian_pmbljrn_Request $request)
    {
        m_5a_kurikulum_capaian_pmbljrn::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
