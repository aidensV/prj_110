<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3a5_dosen_industri\Store_m_3a5_dosen_industri_Request;
use App\Http\Requests\m_3a5_dosen_industri\Update_m_3a5_dosen_industri_Request;
use App\Models\m_3a5_dosen_industri;

class c_3a5_dosen_industri extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3a5_dosen_industri = m_3a5_dosen_industri::all();

        return view('admin.m_3a5_dosen_industri.index', compact('m_3a5_dosen_industri'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3a5_dosen_industri.create');
    }

    public function store(Store_m_3a5_dosen_industri_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_3a5_dosen_industri = m_3a5_dosen_industri::create($request->all());

        return redirect()->route('admin.r_3a5_dosen_industri.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a5_dosen_industri = m_3a5_dosen_industri::find($id);

        return view('admin.m_3a5_dosen_industri.edit', compact('m_3a5_dosen_industri'));
    }

    public function update(Update_m_3a5_dosen_industri_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3a5_dosen_industri = m_3a5_dosen_industri::find($id);
        $m_3a5_dosen_industri->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3a5_dosen_industri.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3a5_dosen_industri = m_3a5_dosen_industri::find($id);
        return view('admin.m_3a5_dosen_industri.show', compact('m_3a5_dosen_industri'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3a5_dosen_industri = m_3a5_dosen_industri::find($id);
        $m_3a5_dosen_industri->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3a5_dosen_industri_Request $request)
    {
        m_3a5_dosen_industri::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
