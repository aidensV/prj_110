<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_audit\Store_m_audit_Request;
use App\Http\Requests\m_audit\Update_m_audit_Request;
use App\Models\m_audit;

class c_audit extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_audit = m_audit::all();

        return view('admin.m_audit.index', compact('m_audit'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_audit.create');
    }

    public function store(Store_m_audit_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_audit = m_audit::create($request->all());

        return redirect()->route('admin.r_audit.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_audit = m_audit::find($id);
        // return $m_audit->id;
        return view('admin.m_audit.edit', compact('m_audit'));
    }

    public function update(Update_m_audit_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_audit = m_audit::find($id);
        $m_audit->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_audit.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_audit = m_audit::find($id);
        // return $m_audit;
        return view('admin.m_audit.show', compact('m_audit'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_audit = m_audit::find($id);
            $m_audit->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_audit_Request $request)
    {
        m_audit::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
