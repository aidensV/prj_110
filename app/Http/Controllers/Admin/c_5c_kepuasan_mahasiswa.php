<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_5c_kepuasan_mahasiswa\Store_m_5c_kepuasan_mahasiswa_Request;
use App\Http\Requests\m_5c_kepuasan_mahasiswa\Update_m_5c_kepuasan_mahasiswa_Request;
use App\Models\m_5c_kepuasan_mahasiswa;

class c_5c_kepuasan_mahasiswa extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::all();

        return view('admin.m_5c_kepuasan_mahasiswa.index', compact('m_5c_kepuasan_mahasiswa'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_5c_kepuasan_mahasiswa.create');
    }

    public function store(Store_m_5c_kepuasan_mahasiswa_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::create($request->all());

        return redirect()->route('admin.r_5c_kepuasan_mahasiswa.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::find($id);

        return view('admin.m_5c_kepuasan_mahasiswa.edit', compact('m_5c_kepuasan_mahasiswa'));
    }

    public function update(Update_m_5c_kepuasan_mahasiswa_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::find($id);
        $m_5c_kepuasan_mahasiswa->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_5c_kepuasan_mahasiswa.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::find($id);
        return view('admin.m_5c_kepuasan_mahasiswa.show', compact('m_5c_kepuasan_mahasiswa'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_5c_kepuasan_mahasiswa = m_5c_kepuasan_mahasiswa::find($id);
        $m_5c_kepuasan_mahasiswa->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_5c_kepuasan_mahasiswa_Request $request)
    {
        m_5c_kepuasan_mahasiswa::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
