<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_2b_mahasiswa_asing\Store_m_2b_mahasiswa_asing_Request;
use App\Http\Requests\m_2b_mahasiswa_asing\Update_m_2b_mahasiswa_asing_Request;
use App\Models\m_2b_mahasiswa_asing;

class c_2b_mahasiswa_asing extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::all();

        return view('admin.m_2b_mahasiswa_asing.index', compact('m_2b_mahasiswa_asing'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_2b_mahasiswa_asing.create');
    }

    public function store(Store_m_2b_mahasiswa_asing_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::create($request->all());

        return redirect()->route('admin.r_2b_mahasiswa_asing.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::find($id);
        // return $m_2b_mahasiswa_asing->id;
        return view('admin.m_2b_mahasiswa_asing.edit', compact('m_2b_mahasiswa_asing'));
    }

    public function update(Update_m_2b_mahasiswa_asing_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::find($id);
        $m_2b_mahasiswa_asing->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_2b_mahasiswa_asing.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::find($id);
        // return $m_2b_mahasiswa_asing;
        return view('admin.m_2b_mahasiswa_asing.show', compact('m_2b_mahasiswa_asing'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_2b_mahasiswa_asing = m_2b_mahasiswa_asing::find($id);
            $m_2b_mahasiswa_asing->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_2b_mahasiswa_asing_Request $request)
    {
        m_2b_mahasiswa_asing::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
