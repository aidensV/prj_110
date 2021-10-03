<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8a_ipk_lulusan\Store_m_8a_ipk_lulusan_Request;
use App\Http\Requests\m_8a_ipk_lulusan\Update_m_8a_ipk_lulusan_Request;
use App\Models\m_8a_ipk_lulusan;

class c_8a_ipk_lulusan extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8a_ipk_lulusan = m_8a_ipk_lulusan::all();

        return view('admin.m_8a_ipk_lulusan.index', compact('m_8a_ipk_lulusan'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8a_ipk_lulusan.create');
    }

    public function store(Store_m_8a_ipk_lulusan_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8a_ipk_lulusan = m_8a_ipk_lulusan::create($request->all());

        return redirect()->route('admin.r_8a_ipk_lulusan.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8a_ipk_lulusan = m_8a_ipk_lulusan::find($id);
        // return $m_8a_ipk_lulusan->id;
        return view('admin.m_8a_ipk_lulusan.edit', compact('m_8a_ipk_lulusan'));
    }

    public function update(Update_m_8a_ipk_lulusan_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8a_ipk_lulusan = m_8a_ipk_lulusan::find($id);
        $m_8a_ipk_lulusan->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8a_ipk_lulusan.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8a_ipk_lulusan = m_8a_ipk_lulusan::find($id);
        // return $m_8a_ipk_lulusan;
        return view('admin.m_8a_ipk_lulusan.show', compact('m_8a_ipk_lulusan'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8a_ipk_lulusan = m_8a_ipk_lulusan::find($id);
            $m_8a_ipk_lulusan->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8a_ipk_lulusan_Request $request)
    {
        m_8a_ipk_lulusan::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
