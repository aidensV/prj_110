<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8f4_1_luaran_penelitian_mp\Store_m_8f4_1_luaran_penelitian_mp_Request;
use App\Http\Requests\m_8f4_1_luaran_penelitian_mp\Update_m_8f4_1_luaran_penelitian_mp_Request;
use App\Models\m_8f4_1_luaran_penelitian_mp;

class c_8f4_1_luaran_penelitian_mp extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::all();

        return view('admin.m_8f4_1_luaran_penelitian_mp.index', compact('m_8f4_1_luaran_penelitian_mp'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8f4_1_luaran_penelitian_mp.create');
    }

    public function store(Store_m_8f4_1_luaran_penelitian_mp_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::create($request->all());

        return redirect()->route('admin.r_8f4_1_luaran_penelitian_mp.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::find($id);
        // return $m_8f4_1_luaran_penelitian_mp->id;
        return view('admin.m_8f4_1_luaran_penelitian_mp.edit', compact('m_8f4_1_luaran_penelitian_mp'));
    }

    public function update(Update_m_8f4_1_luaran_penelitian_mp_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::find($id);
        $m_8f4_1_luaran_penelitian_mp->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8f4_1_luaran_penelitian_mp.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::find($id);
        // return $m_8f4_1_luaran_penelitian_mp;
        return view('admin.m_8f4_1_luaran_penelitian_mp.show', compact('m_8f4_1_luaran_penelitian_mp'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8f4_1_luaran_penelitian_mp = m_8f4_1_luaran_penelitian_mp::find($id);
            $m_8f4_1_luaran_penelitian_mp->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8f4_1_luaran_penelitian_mp_Request $request)
    {
        m_8f4_1_luaran_penelitian_mp::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
