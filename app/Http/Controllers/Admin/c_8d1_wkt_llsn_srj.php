<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8d1_wkt_llsn_srj\Store_m_8d1_wkt_llsn_srj_Request;
use App\Http\Requests\m_8d1_wkt_llsn_srj\Update_m_8d1_wkt_llsn_srj_Request;
use App\m_lkps;
use App\Models\m_8d1_wkt_llsn_srj;

class c_8d1_wkt_llsn_srj extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::all();

        return view('admin.m_8d1_wkt_llsn_srj.index', compact('m_8d1_wkt_llsn_srj'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8d1_wkt_llsn_srj.create');
    }

    public function store(Store_m_8d1_wkt_llsn_srj_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::create($request->all());
        $lkps = m_lkps::where('id',37)->first();
        $lkps->waktuLulusanSarjana()->save($m_8d1_wkt_llsn_srj);
        return redirect()->route('admin.r_8d1_wkt_llsn_srj.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::find($id);
        // return $m_8d1_wkt_llsn_srj->id;
        return view('admin.m_8d1_wkt_llsn_srj.edit', compact('m_8d1_wkt_llsn_srj'));
    }

    public function update(Update_m_8d1_wkt_llsn_srj_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::find($id);
        $m_8d1_wkt_llsn_srj->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8d1_wkt_llsn_srj.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::find($id);
        // return $m_8d1_wkt_llsn_srj;
        return view('admin.m_8d1_wkt_llsn_srj.show', compact('m_8d1_wkt_llsn_srj'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8d1_wkt_llsn_srj = m_8d1_wkt_llsn_srj::find($id);
            $m_8d1_wkt_llsn_srj->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8d1_wkt_llsn_srj_Request $request)
    {
        m_8d1_wkt_llsn_srj::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
