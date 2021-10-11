<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8b2_prestasi_nonakdmk_mhs\Store_m_8b2_prestasi_nonakdmk_mhs_Request;
use App\Http\Requests\m_8b2_prestasi_nonakdmk_mhs\Update_m_8b2_prestasi_nonakdmk_mhs_Request;
use App\m_lkps;
use App\Models\m_8b2_prestasi_nonakdmk_mhs;

class c_8b2_prestasi_nonakdmk_mhs extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::all();

        return view('admin.m_8b2_prestasi_nonakdmk_mhs.index', compact('m_8b2_prestasi_nonakdmk_mhs'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8b2_prestasi_nonakdmk_mhs.create');
    }

    public function store(Store_m_8b2_prestasi_nonakdmk_mhs_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::create($request->all());
        $lkps = m_lkps::where('id',31)->first();
        $lkps->prestaisNonAkademik()->save($m_8b2_prestasi_nonakdmk_mhs);
        return redirect()->route('admin.r_8b2_prestasi_nonakdmk_mhs.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::find($id);
        // return $m_8b2_prestasi_nonakdmk_mhs->id;
        return view('admin.m_8b2_prestasi_nonakdmk_mhs.edit', compact('m_8b2_prestasi_nonakdmk_mhs'));
    }

    public function update(Update_m_8b2_prestasi_nonakdmk_mhs_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::find($id);
        $m_8b2_prestasi_nonakdmk_mhs->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8b2_prestasi_nonakdmk_mhs.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::find($id);
        // return $m_8b2_prestasi_nonakdmk_mhs;
        return view('admin.m_8b2_prestasi_nonakdmk_mhs.show', compact('m_8b2_prestasi_nonakdmk_mhs'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8b2_prestasi_nonakdmk_mhs = m_8b2_prestasi_nonakdmk_mhs::find($id);
            $m_8b2_prestasi_nonakdmk_mhs->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8b2_prestasi_nonakdmk_mhs_Request $request)
    {
        m_8b2_prestasi_nonakdmk_mhs::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
