<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8f4_2_luaran_penelitian_mhc\Store_m_8f4_2_luaran_penelitian_mhc_Request;
use App\Http\Requests\m_8f4_2_luaran_penelitian_mhc\Update_m_8f4_2_luaran_penelitian_mhc_Request;
use App\Models\m_8f4_2_luaran_penelitian_mhc;

class c_8f4_2_luaran_penelitian_mhc extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::all();

        return view('admin.m_8f4_2_luaran_penelitian_mhc.index', compact('m_8f4_2_luaran_penelitian_mhc'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8f4_2_luaran_penelitian_mhc.create');
    }

    public function store(Store_m_8f4_2_luaran_penelitian_mhc_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::create($request->all());

        return redirect()->route('admin.r_8f4_2_luaran_penelitian_mhc.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::find($id);
        // return $m_8f4_2_luaran_penelitian_mhc->id;
        return view('admin.m_8f4_2_luaran_penelitian_mhc.edit', compact('m_8f4_2_luaran_penelitian_mhc'));
    }

    public function update(Update_m_8f4_2_luaran_penelitian_mhc_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::find($id);
        $m_8f4_2_luaran_penelitian_mhc->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8f4_2_luaran_penelitian_mhc.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::find($id);
        // return $m_8f4_2_luaran_penelitian_mhc;
        return view('admin.m_8f4_2_luaran_penelitian_mhc.show', compact('m_8f4_2_luaran_penelitian_mhc'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8f4_2_luaran_penelitian_mhc = m_8f4_2_luaran_penelitian_mhc::find($id);
            $m_8f4_2_luaran_penelitian_mhc->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8f4_2_luaran_penelitian_mhc_Request $request)
    {
        m_8f4_2_luaran_penelitian_mhc::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
