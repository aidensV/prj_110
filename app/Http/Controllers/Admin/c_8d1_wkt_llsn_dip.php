<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8d1_wkt_llsn_dip\Store_m_8d1_wkt_llsn_dip_Request;
use App\Http\Requests\m_8d1_wkt_llsn_dip\Update_m_8d1_wkt_llsn_dip_Request;
use App\m_lkps;
use App\Models\m_8d1_wkt_llsn_dip;

class c_8d1_wkt_llsn_dip extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::all();

        return view('admin.m_8d1_wkt_llsn_dip.index', compact('m_8d1_wkt_llsn_dip'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8d1_wkt_llsn_dip.create');
    }

    public function store(Store_m_8d1_wkt_llsn_dip_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::create($request->all());
        $lkps = m_lkps::where('id',36)->first();
        $lkps->waktuLulusanDiploma()->save($m_8d1_wkt_llsn_dip);
        return redirect()->route('admin.r_8d1_wkt_llsn_dip.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::find($id);
        // return $m_8d1_wkt_llsn_dip->id;
        return view('admin.m_8d1_wkt_llsn_dip.edit', compact('m_8d1_wkt_llsn_dip'));
    }

    public function update(Update_m_8d1_wkt_llsn_dip_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::find($id);
        $m_8d1_wkt_llsn_dip->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8d1_wkt_llsn_dip.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::find($id);
        // return $m_8d1_wkt_llsn_dip;
        return view('admin.m_8d1_wkt_llsn_dip.show', compact('m_8d1_wkt_llsn_dip'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8d1_wkt_llsn_dip = m_8d1_wkt_llsn_dip::find($id);
            $m_8d1_wkt_llsn_dip->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8d1_wkt_llsn_dip_Request $request)
    {
        m_8d1_wkt_llsn_dip::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
