<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8c_masastudi_lllsn_dok\Store_m_8c_masastudi_lllsn_dok_Request;
use App\Http\Requests\m_8c_masastudi_lllsn_dok\Update_m_8c_masastudi_lllsn_dok_Request;
use App\Models\m_8c_masastudi_lllsn_dok;

class c_8c_masastudi_lllsn_dok extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::all();

        return view('admin.m_8c_masastudi_lllsn_dok.index', compact('m_8c_masastudi_lllsn_dok'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8c_masastudi_lllsn_dok.create');
    }

    public function store(Store_m_8c_masastudi_lllsn_dok_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::create($request->all());

        return redirect()->route('admin.r_8c_masastudi_lllsn_dok.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::find($id);
        // return $m_8c_masastudi_lllsn_dok->id;
        return view('admin.m_8c_masastudi_lllsn_dok.edit', compact('m_8c_masastudi_lllsn_dok'));
    }

    public function update(Update_m_8c_masastudi_lllsn_dok_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::find($id);
        $m_8c_masastudi_lllsn_dok->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8c_masastudi_lllsn_dok.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::find($id);
        // return $m_8c_masastudi_lllsn_dok;
        return view('admin.m_8c_masastudi_lllsn_dok.show', compact('m_8c_masastudi_lllsn_dok'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8c_masastudi_lllsn_dok = m_8c_masastudi_lllsn_dok::find($id);
            $m_8c_masastudi_lllsn_dok->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8c_masastudi_lllsn_dok_Request $request)
    {
        m_8c_masastudi_lllsn_dok::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
