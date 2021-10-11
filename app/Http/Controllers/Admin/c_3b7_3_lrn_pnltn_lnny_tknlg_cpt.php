<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b7_3_lrn_pnltn_lnny_tknlg_cpt\Store_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request;
use App\Http\Requests\m_3b7_3_lrn_pnltn_lnny_tknlg_cpt\Update_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request;
use App\m_lkps;
use App\Models\m_3b7_3_lrn_pnltn_lnny_tknlg_cpt;
use Illuminate\Support\Facades\Session;

class c_3b7_3_lrn_pnltn_lnny_tknlg_cpt extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::all();

        return view('admin.m_3b7_3_lrn_pnltn_lnny_tknlg_cpt.index', compact('m_3b7_3_lrn_pnltn_lnny_tknlg_cpt'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b7_3_lrn_pnltn_lnny_tknlg_cpt.create');
    }

    public function store(Store_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::create($request->all());
        $lkps = m_lkps::where('id',20)->first();
        $lkps->luaranPenelitianLainnyaTeknologiCpt()->save($m_3b7_3_lrn_pnltn_lnny_tknlg_cpt);
        return redirect()->route('admin.r_3b7_3_lrn_pnltn_lnny_tknlg_cpt.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::find($id);

        return view('admin.m_3b7_3_lrn_pnltn_lnny_tknlg_cpt.edit', compact('m_3b7_3_lrn_pnltn_lnny_tknlg_cpt'));
    }

    public function update(Update_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::find($id);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b7_3_lrn_pnltn_lnny_tknlg_cpt.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::find($id);
        return view('admin.m_3b7_3_lrn_pnltn_lnny_tknlg_cpt.show', compact('m_3b7_3_lrn_pnltn_lnny_tknlg_cpt'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt = m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::find($id);
        $m_3b7_3_lrn_pnltn_lnny_tknlg_cpt->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b7_3_lrn_pnltn_lnny_tknlg_cpt_Request $request)
    {
        m_3b7_3_lrn_pnltn_lnny_tknlg_cpt::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
