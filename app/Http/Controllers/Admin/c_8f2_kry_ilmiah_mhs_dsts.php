<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8f2_kry_ilmiah_mhs_dsts\Store_m_8f2_kry_ilmiah_mhs_dsts_Request;
use App\Http\Requests\m_8f2_kry_ilmiah_mhs_dsts\Update_m_8f2_kry_ilmiah_mhs_dsts_Request;
use App\Models\m_8f2_kry_ilmiah_mhs_dsts;

class c_8f2_kry_ilmiah_mhs_dsts extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::all();

        return view('admin.m_8f2_kry_ilmiah_mhs_dsts.index', compact('m_8f2_kry_ilmiah_mhs_dsts'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8f2_kry_ilmiah_mhs_dsts.create');
    }

    public function store(Store_m_8f2_kry_ilmiah_mhs_dsts_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::create($request->all());

        return redirect()->route('admin.r_8f2_kry_ilmiah_mhs_dsts.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::find($id);
        // return $m_8f2_kry_ilmiah_mhs_dsts->id;
        return view('admin.m_8f2_kry_ilmiah_mhs_dsts.edit', compact('m_8f2_kry_ilmiah_mhs_dsts'));
    }

    public function update(Update_m_8f2_kry_ilmiah_mhs_dsts_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::find($id);
        $m_8f2_kry_ilmiah_mhs_dsts->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8f2_kry_ilmiah_mhs_dsts.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::find($id);
        // return $m_8f2_kry_ilmiah_mhs_dsts;
        return view('admin.m_8f2_kry_ilmiah_mhs_dsts.show', compact('m_8f2_kry_ilmiah_mhs_dsts'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8f2_kry_ilmiah_mhs_dsts = m_8f2_kry_ilmiah_mhs_dsts::find($id);
            $m_8f2_kry_ilmiah_mhs_dsts->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8f2_kry_ilmiah_mhs_dsts_Request $request)
    {
        m_8f2_kry_ilmiah_mhs_dsts::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
