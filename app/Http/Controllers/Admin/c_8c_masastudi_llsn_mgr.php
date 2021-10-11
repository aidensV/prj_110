<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8c_masastudi_llsn_mgr\Store_m_8c_masastudi_llsn_mgr_Request;
use App\Http\Requests\m_8c_masastudi_llsn_mgr\Update_m_8c_masastudi_llsn_mgr_Request;
use App\m_lkps;
use App\Models\m_8c_masastudi_llsn_mgr;

class c_8c_masastudi_llsn_mgr extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::all();

        return view('admin.m_8c_masastudi_llsn_mgr.index', compact('m_8c_masastudi_llsn_mgr'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8c_masastudi_llsn_mgr.create');
    }

    public function store(Store_m_8c_masastudi_llsn_mgr_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::create($request->all());
        $lkps = m_lkps::where('id',35)->first();
        $lkps->masaStudiLlsnMagister()->save($m_8c_masastudi_llsn_mgr);
        return redirect()->route('admin.r_8c_masastudi_llsn_mgr.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::find($id);
        // return $m_8c_masastudi_llsn_mgr->id;
        return view('admin.m_8c_masastudi_llsn_mgr.edit', compact('m_8c_masastudi_llsn_mgr'));
    }

    public function update(Update_m_8c_masastudi_llsn_mgr_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::find($id);
        $m_8c_masastudi_llsn_mgr->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8c_masastudi_llsn_mgr.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::find($id);
        // return $m_8c_masastudi_llsn_mgr;
        return view('admin.m_8c_masastudi_llsn_mgr.show', compact('m_8c_masastudi_llsn_mgr'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8c_masastudi_llsn_mgr = m_8c_masastudi_llsn_mgr::find($id);
            $m_8c_masastudi_llsn_mgr->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8c_masastudi_llsn_mgr_Request $request)
    {
        m_8c_masastudi_llsn_mgr::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
