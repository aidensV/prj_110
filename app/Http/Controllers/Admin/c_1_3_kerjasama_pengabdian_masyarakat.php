<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_1_3_kerjasama_pengabdian_masyarakat\Store_m_1_3_kerjasama_pengabdian_masyarakat_Request;
use App\Http\Requests\m_1_3_kerjasama_pengabdian_masyarakat\Update_m_1_3_kerjasama_pengabdian_masyarakat_Request;
use App\Models\m_1_3_kerjasama_pengabdian_masyarakat;

class c_1_3_kerjasama_pengabdian_masyarakat extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::all();

        return view('admin.m_1_3_kerjasama_pengabdian_masyarakat.index', compact('m_1_3_kerjasama_pengabdian_masyarakat'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_1_3_kerjasama_pengabdian_masyarakat.create');
    }

    public function store(Store_m_1_3_kerjasama_pengabdian_masyarakat_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::create($request->all());

        return redirect()->route('admin.r_1_3_kerjasama_pkm.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::find($id);
        // return $m_1_3_kerjasama_pengabdian_masyarakat->id;
        return view('admin.m_1_3_kerjasama_pengabdian_masyarakat.edit', compact('m_1_3_kerjasama_pengabdian_masyarakat'));
    }

    public function update(Update_m_1_3_kerjasama_pengabdian_masyarakat_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::find($id);
        $m_1_3_kerjasama_pengabdian_masyarakat->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_1_3_kerjasama_pkm.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::find($id);
        // return $m_1_3_kerjasama_pengabdian_masyarakat;
        return view('admin.m_1_3_kerjasama_pengabdian_masyarakat.show', compact('m_1_3_kerjasama_pengabdian_masyarakat'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_1_3_kerjasama_pengabdian_masyarakat = m_1_3_kerjasama_pengabdian_masyarakat::find($id);
            $m_1_3_kerjasama_pengabdian_masyarakat->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_1_3_kerjasama_pengabdian_masyarakat_Request $request)
    {
        m_1_3_kerjasama_pengabdian_masyarakat::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
