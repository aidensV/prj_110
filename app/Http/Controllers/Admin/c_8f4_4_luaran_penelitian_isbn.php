<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8f4_4_luaran_penelitian_isbn\Store_m_8f4_4_luaran_penelitian_isbn_Request;
use App\Http\Requests\m_8f4_4_luaran_penelitian_isbn\Update_m_8f4_4_luaran_penelitian_isbn_Request;
use App\Models\m_8f4_4_luaran_penelitian_isbn;

class c_8f4_4_luaran_penelitian_isbn extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::all();

        return view('admin.m_8f4_4_luaran_penelitian_isbn.index', compact('m_8f4_4_luaran_penelitian_isbn'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8f4_4_luaran_penelitian_isbn.create');
    }

    public function store(Store_m_8f4_4_luaran_penelitian_isbn_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::create($request->all());

        return redirect()->route('admin.r_8f4_4_luaran_penelitian_isbn.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::find($id);
        // return $m_8f4_4_luaran_penelitian_isbn->id;
        return view('admin.m_8f4_4_luaran_penelitian_isbn.edit', compact('m_8f4_4_luaran_penelitian_isbn'));
    }

    public function update(Update_m_8f4_4_luaran_penelitian_isbn_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::find($id);
        $m_8f4_4_luaran_penelitian_isbn->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8f4_4_luaran_penelitian_isbn.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::find($id);
        // return $m_8f4_4_luaran_penelitian_isbn;
        return view('admin.m_8f4_4_luaran_penelitian_isbn.show', compact('m_8f4_4_luaran_penelitian_isbn'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8f4_4_luaran_penelitian_isbn = m_8f4_4_luaran_penelitian_isbn::find($id);
            $m_8f4_4_luaran_penelitian_isbn->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8f4_4_luaran_penelitian_isbn_Request $request)
    {
        m_8f4_4_luaran_penelitian_isbn::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
