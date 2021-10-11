<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_7_pkm_dtps_yg_melibatkan_mhs\Store_m_7_pkm_dtps_yg_melibatkan_mhs_Request;
use App\Http\Requests\m_7_pkm_dtps_yg_melibatkan_mhs\Update_m_7_pkm_dtps_yg_melibatkan_mhs_Request;
use App\m_lkps;
use App\Models\m_7_pkm_dtps_yg_melibatkan_mhs;

class c_7_pkm_dtps_yg_melibatkan_mhs extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::all();

        return view('admin.m_7_pkm_dtps_yg_melibatkan_mhs.index', compact('m_7_pkm_dtps_yg_melibatkan_mhs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_7_pkm_dtps_yg_melibatkan_mhs.create');
    }

    public function store(Store_m_7_pkm_dtps_yg_melibatkan_mhs_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::create($request->all());
        $lkps = m_lkps::where('id',28)->first();
        $lkps->pkmDtpsYgMelibatkanMhs()->save($m_7_pkm_dtps_yg_melibatkan_mhs);
        return redirect()->route('admin.r_7_pkm_dtps_yg_melibatkan_mhs.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::find($id);

        return view('admin.m_7_pkm_dtps_yg_melibatkan_mhs.edit', compact('m_7_pkm_dtps_yg_melibatkan_mhs'));
    }

    public function update(Update_m_7_pkm_dtps_yg_melibatkan_mhs_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::find($id);
        $m_7_pkm_dtps_yg_melibatkan_mhs->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_7_pkm_dtps_yg_melibatkan_mhs.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::find($id);
        return view('admin.m_7_pkm_dtps_yg_melibatkan_mhs.show', compact('m_7_pkm_dtps_yg_melibatkan_mhs'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_7_pkm_dtps_yg_melibatkan_mhs = m_7_pkm_dtps_yg_melibatkan_mhs::find($id);
        $m_7_pkm_dtps_yg_melibatkan_mhs->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_7_pkm_dtps_yg_melibatkan_mhs_Request $request)
    {
        m_7_pkm_dtps_yg_melibatkan_mhs::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
