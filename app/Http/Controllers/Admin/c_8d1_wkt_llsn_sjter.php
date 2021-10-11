<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8d1_wkt_llsn_sjter\Store_m_8d1_wkt_llsn_sjter_Request;
use App\Http\Requests\m_8d1_wkt_llsn_sjter\Update_m_8d1_wkt_llsn_sjter_Request;
use App\m_lkps;
use App\Models\m_8d1_wkt_llsn_sjter;

class c_8d1_wkt_llsn_sjter extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::all();

        return view('admin.m_8d1_wkt_llsn_sjter.index', compact('m_8d1_wkt_llsn_sjter'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8d1_wkt_llsn_sjter.create');
    }

    public function store(Store_m_8d1_wkt_llsn_sjter_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::create($request->all());
        $lkps = m_lkps::where('id',38)->first();
        $lkps->waktuLulusanSarjanaTerapan()->save($m_8d1_wkt_llsn_sjter);
        return redirect()->route('admin.r_8d1_wkt_llsn_sjter.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::find($id);
        // return $m_8d1_wkt_llsn_sjter->id;
        return view('admin.m_8d1_wkt_llsn_sjter.edit', compact('m_8d1_wkt_llsn_sjter'));
    }

    public function update(Update_m_8d1_wkt_llsn_sjter_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::find($id);
        $m_8d1_wkt_llsn_sjter->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8d1_wkt_llsn_sjter.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::find($id);
        // return $m_8d1_wkt_llsn_sjter;
        return view('admin.m_8d1_wkt_llsn_sjter.show', compact('m_8d1_wkt_llsn_sjter'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8d1_wkt_llsn_sjter = m_8d1_wkt_llsn_sjter::find($id);
            $m_8d1_wkt_llsn_sjter->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8d1_wkt_llsn_sjter_Request $request)
    {
        m_8d1_wkt_llsn_sjter::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
