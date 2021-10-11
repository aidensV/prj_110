<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_6a_pnltn_dtps_yg_mlbtkn_mhs\Store_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request;
use App\Http\Requests\m_6a_pnltn_dtps_yg_mlbtkn_mhs\Update_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request;
use App\m_lkps;
use App\Models\m_6a_pnltn_dtps_yg_mlbtkn_mhs;

class c_6a_pnltn_dtps_yg_mlbtkn_mhs extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::all();

        return view('admin.m_6a_pnltn_dtps_yg_mlbtkn_mhs.index', compact('m_6a_pnltn_dtps_yg_mlbtkn_mhs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_6a_pnltn_dtps_yg_mlbtkn_mhs.create');
    }

    public function store(Store_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::create($request->all());
        $lkps = m_lkps::where('id',26)->first();
        $lkps->penelitianDtpsYgMelibatkanMhs()->save($m_6a_pnltn_dtps_yg_mlbtkn_mhs);
        return redirect()->route('admin.r_6a_pnltn_dtps_yg_mlbtkn_mhs.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::find($id);

        return view('admin.m_6a_pnltn_dtps_yg_mlbtkn_mhs.edit', compact('m_6a_pnltn_dtps_yg_mlbtkn_mhs'));
    }

    public function update(Update_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::find($id);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_6a_pnltn_dtps_yg_mlbtkn_mhs.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::find($id);
        return view('admin.m_6a_pnltn_dtps_yg_mlbtkn_mhs.show', compact('m_6a_pnltn_dtps_yg_mlbtkn_mhs'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs = m_6a_pnltn_dtps_yg_mlbtkn_mhs::find($id);
        $m_6a_pnltn_dtps_yg_mlbtkn_mhs->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_6a_pnltn_dtps_yg_mlbtkn_mhs_Request $request)
    {
        m_6a_pnltn_dtps_yg_mlbtkn_mhs::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
