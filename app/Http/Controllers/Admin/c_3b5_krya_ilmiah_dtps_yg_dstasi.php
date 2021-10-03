<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b5_krya_ilmiah_dtps_yg_dstasi\Store_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request;
use App\Http\Requests\m_3b5_krya_ilmiah_dtps_yg_dstasi\Update_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request;
use App\Models\m_3b5_krya_ilmiah_dtps_yg_dstasi;

class c_3b5_krya_ilmiah_dtps_yg_dstasi extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::all();

        return view('admin.m_3b5_krya_ilmiah_dtps_yg_dstasi.index', compact('m_3b5_krya_ilmiah_dtps_yg_dstasi'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b5_krya_ilmiah_dtps_yg_dstasi.create');
    }

    public function store(Store_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::create($request->all());

        return redirect()->route('admin.r_3b5_krya_ilmiah_dtps_yg_dstasi.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::find($id);

        return view('admin.m_3b5_krya_ilmiah_dtps_yg_dstasi.edit', compact('m_3b5_krya_ilmiah_dtps_yg_dstasi'));
    }

    public function update(Update_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::find($id);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b5_krya_ilmiah_dtps_yg_dstasi.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::find($id);
        return view('admin.m_3b5_krya_ilmiah_dtps_yg_dstasi.show', compact('m_3b5_krya_ilmiah_dtps_yg_dstasi'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi = m_3b5_krya_ilmiah_dtps_yg_dstasi::find($id);
        $m_3b5_krya_ilmiah_dtps_yg_dstasi->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b5_krya_ilmiah_dtps_yg_dstasi_Request $request)
    {
        m_3b5_krya_ilmiah_dtps_yg_dstasi::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
