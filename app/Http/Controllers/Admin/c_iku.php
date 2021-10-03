<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_iku\Store_m_iku_Request;
use App\Http\Requests\m_iku\Update_m_iku_Request;
use App\Models\m_iku;

class c_iku extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_iku = m_iku::all();

        return view('admin.m_iku.index', compact('m_iku'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_iku.create');
    }

    public function store(Store_m_iku_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_iku = m_iku::create($request->all());

        return redirect()->route('admin.r_iku.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_iku = m_iku::find($id);
        // return $m_iku->id;
        return view('admin.m_iku.edit', compact('m_iku'));
    }

    public function update(Update_m_iku_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_iku = m_iku::find($id);
        $m_iku->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_iku.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_iku = m_iku::find($id);
        // return $m_iku;
        return view('admin.m_iku.show', compact('m_iku'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_iku = m_iku::find($id);
            $m_iku->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_iku_Request $request)
    {
        m_iku::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
