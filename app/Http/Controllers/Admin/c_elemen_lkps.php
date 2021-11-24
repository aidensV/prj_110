<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_elemen_lkps\Store_m_elemen_lkps_Request;
use App\Http\Requests\m_elemen_lkps\Update_m_elemen_lkps_Request;
use App\Models\m_elemen_lkps;

class c_elemen_lkps extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_elemen_lkps = m_elemen_lkps::all();
        
        return view('admin.m_elemen_lkps.index', compact('m_elemen_lkps'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_elemen_lkps.create');
    }

    public function store(Store_m_elemen_lkps_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_elemen_lkps = m_elemen_lkps::create($request->all());

        return redirect()->route('admin.r_elemen_lkps.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_elemen_lkps = m_elemen_lkps::find($id);
        // return $m_elemen_lkps->id;
        return view('admin.m_elemen_lkps.edit', compact('m_elemen_lkps'));
    }

    public function update(Update_m_elemen_lkps_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_elemen_lkps = m_elemen_lkps::find($id);
        $m_elemen_lkps->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_elemen_lkps.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_elemen_lkps = m_elemen_lkps::find($id);
        // return $m_elemen_lkps;
        return view('admin.m_elemen_lkps.show', compact('m_elemen_lkps'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_elemen_lkps = m_elemen_lkps::find($id);
            $m_elemen_lkps->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_elemen_lkps_Request $request)
    {
        m_elemen_lkps::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
