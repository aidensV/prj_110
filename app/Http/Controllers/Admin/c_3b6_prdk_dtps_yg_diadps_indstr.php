<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b6_prdk_dtps_yg_diadps_indstr\Store_m_3b6_prdk_dtps_yg_diadps_indstr_Request;
use App\Http\Requests\m_3b6_prdk_dtps_yg_diadps_indstr\Update_m_3b6_prdk_dtps_yg_diadps_indstr_Request;
use App\m_lkps;
use App\Models\m_3b6_prdk_dtps_yg_diadps_indstr;
use Illuminate\Support\Facades\Session;

class c_3b6_prdk_dtps_yg_diadps_indstr extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::all();

        return view('admin.m_3b6_prdk_dtps_yg_diadps_indstr.index', compact('m_3b6_prdk_dtps_yg_diadps_indstr'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b6_prdk_dtps_yg_diadps_indstr.create');
    }

    public function store(Store_m_3b6_prdk_dtps_yg_diadps_indstr_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::create($request->all());
        $lkps = m_lkps::where('id',17)->first();
        $lkps->produkIlmiahYangDiadopsi()->save($m_3b6_prdk_dtps_yg_diadps_indstr);
        return redirect()->route('admin.r_3b6_prdk_dtps_yg_diadps_indstr.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::find($id);

        return view('admin.m_3b6_prdk_dtps_yg_diadps_indstr.edit', compact('m_3b6_prdk_dtps_yg_diadps_indstr'));
    }

    public function update(Update_m_3b6_prdk_dtps_yg_diadps_indstr_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::find($id);
        $m_3b6_prdk_dtps_yg_diadps_indstr->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b6_prdk_dtps_yg_diadps_indstr.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::find($id);
        return view('admin.m_3b6_prdk_dtps_yg_diadps_indstr.show', compact('m_3b6_prdk_dtps_yg_diadps_indstr'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b6_prdk_dtps_yg_diadps_indstr = m_3b6_prdk_dtps_yg_diadps_indstr::find($id);
        $m_3b6_prdk_dtps_yg_diadps_indstr->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b6_prdk_dtps_yg_diadps_indstr_Request $request)
    {
        m_3b6_prdk_dtps_yg_diadps_indstr::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
