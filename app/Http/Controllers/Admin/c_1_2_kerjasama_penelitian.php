<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_1_2_kerjasama_penelitian\Store_m_1_2_kerjasama_penelitian_Request;
use App\Http\Requests\m_1_2_kerjasama_penelitian\Update_m_1_2_kerjasama_penelitian_Request;
use App\m_lkps;
use App\Models\m_1_2_kerjasama_penelitian;

class c_1_2_kerjasama_penelitian extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::all();

        return view('admin.m_1_2_kerjasama_penelitian.index', compact('m_1_2_kerjasama_penelitian'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_1_2_kerjasama_penelitian.create');
    }

    public function store(Store_m_1_2_kerjasama_penelitian_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::create($request->all());
        $lkps = m_lkps::where('id','3')->first();
        $lkps->kerjasamaPenelitian()->save($m_1_2_kerjasama_penelitian);
        return redirect()->route('admin.r_1_2_kerjasama_penelitian.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::find($id);
        // return $m_1_2_kerjasama_penelitian->id;
        return view('admin.m_1_2_kerjasama_penelitian.edit', compact('m_1_2_kerjasama_penelitian'));
    }

    public function update(Update_m_1_2_kerjasama_penelitian_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::find($id);
        $m_1_2_kerjasama_penelitian->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_1_2_kerjasama_penelitian.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::find($id);
        // return $m_1_2_kerjasama_penelitian;
        return view('admin.m_1_2_kerjasama_penelitian.show', compact('m_1_2_kerjasama_penelitian'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_1_2_kerjasama_penelitian = m_1_2_kerjasama_penelitian::find($id);
        $m_1_2_kerjasama_penelitian->delete();
        return back();
    }

    public function massDestroy(MassDestroy_m_1_2_kerjasama_penelitian_Request $request)
    {
        m_1_2_kerjasama_penelitian::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
