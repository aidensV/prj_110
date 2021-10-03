<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8f4_3_luaran_penelitian_ttg\Store_m_8f4_3_luaran_penelitian_ttg_Request;
use App\Http\Requests\m_8f4_3_luaran_penelitian_ttg\Update_m_8f4_3_luaran_penelitian_ttg_Request;
use App\Models\m_8f4_3_luaran_penelitian_ttg;

class c_8f4_3_luaran_penelitian_ttg extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::all();

        return view('admin.m_8f4_3_luaran_penelitian_ttg.index', compact('m_8f4_3_luaran_penelitian_ttg'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8f4_3_luaran_penelitian_ttg.create');
    }

    public function store(Store_m_8f4_3_luaran_penelitian_ttg_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::create($request->all());

        return redirect()->route('admin.r_8f4_3_luaran_penelitian_ttg.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::find($id);
        // return $m_8f4_3_luaran_penelitian_ttg->id;
        return view('admin.m_8f4_3_luaran_penelitian_ttg.edit', compact('m_8f4_3_luaran_penelitian_ttg'));
    }

    public function update(Update_m_8f4_3_luaran_penelitian_ttg_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::find($id);
        $m_8f4_3_luaran_penelitian_ttg->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8f4_3_luaran_penelitian_ttg.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::find($id);
        // return $m_8f4_3_luaran_penelitian_ttg;
        return view('admin.m_8f4_3_luaran_penelitian_ttg.show', compact('m_8f4_3_luaran_penelitian_ttg'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8f4_3_luaran_penelitian_ttg = m_8f4_3_luaran_penelitian_ttg::find($id);
            $m_8f4_3_luaran_penelitian_ttg->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8f4_3_luaran_penelitian_ttg_Request $request)
    {
        m_8f4_3_luaran_penelitian_ttg::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
