<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_6b_pen_dtps_yg_mjd_ruj_tm_tss\Store_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request;
use App\Http\Requests\m_6b_pen_dtps_yg_mjd_ruj_tm_tss\Update_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request;
use App\m_lkps;
use App\Models\m_6b_pen_dtps_yg_mjd_ruj_tm_tss;

class c_6b_pen_dtps_yg_mjd_ruj_tm_tss extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::all();

        return view('admin.m_6b_pen_dtps_yg_mjd_ruj_tm_tss.index', compact('m_6b_pen_dtps_yg_mjd_ruj_tm_tss'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_6b_pen_dtps_yg_mjd_ruj_tm_tss.create');
    }

    public function store(Store_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::create($request->all());
        $lkps = m_lkps::where('id',27)->first();
        $lkps->dtpsYgJdRujukanTmTss()->save($m_6b_pen_dtps_yg_mjd_ruj_tm_tss);
        return redirect()->route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::find($id);

        return view('admin.m_6b_pen_dtps_yg_mjd_ruj_tm_tss.edit', compact('m_6b_pen_dtps_yg_mjd_ruj_tm_tss'));
    }

    public function update(Update_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::find($id);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_6b_pen_dtps_yg_mjd_ruj_tm_tss.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::find($id);
        return view('admin.m_6b_pen_dtps_yg_mjd_ruj_tm_tss.show', compact('m_6b_pen_dtps_yg_mjd_ruj_tm_tss'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss = m_6b_pen_dtps_yg_mjd_ruj_tm_tss::find($id);
        $m_6b_pen_dtps_yg_mjd_ruj_tm_tss->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_6b_pen_dtps_yg_mjd_ruj_tm_tss_Request $request)
    {
        m_6b_pen_dtps_yg_mjd_ruj_tm_tss::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
