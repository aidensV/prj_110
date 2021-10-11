<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b4_1_publikasi_ilmiah_dtps\Store_m_3b4_1_publikasi_ilmiah_dtps_Request;
use App\Http\Requests\m_3b4_1_publikasi_ilmiah_dtps\Update_m_3b4_1_publikasi_ilmiah_dtps_Request;
use App\m_lkps;
use App\Models\m_3b4_1_publikasi_ilmiah_dtps;
use Illuminate\Support\Facades\Session;

class c_3b4_1_publikasi_ilmiah_dtps extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::all();

        return view('admin.m_3b4_1_publikasi_ilmiah_dtps.index', compact('m_3b4_1_publikasi_ilmiah_dtps'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b4_1_publikasi_ilmiah_dtps.create');
    }

    public function store(Store_m_3b4_1_publikasi_ilmiah_dtps_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::create($request->all());
        $lkps = m_lkps::where('id',14)->first();
        $lkps->publikasiIlmiahDtps()->save($m_3b4_1_publikasi_ilmiah_dtps);
        return redirect()->route('admin.r_3b4_1_publikasi_ilmiah_dtps.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::find($id);

        return view('admin.m_3b4_1_publikasi_ilmiah_dtps.edit', compact('m_3b4_1_publikasi_ilmiah_dtps'));
    }

    public function update(Update_m_3b4_1_publikasi_ilmiah_dtps_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::find($id);
        $m_3b4_1_publikasi_ilmiah_dtps->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b4_1_publikasi_ilmiah_dtps.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::find($id);
        return view('admin.m_3b4_1_publikasi_ilmiah_dtps.show', compact('m_3b4_1_publikasi_ilmiah_dtps'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b4_1_publikasi_ilmiah_dtps = m_3b4_1_publikasi_ilmiah_dtps::find($id);
        $m_3b4_1_publikasi_ilmiah_dtps->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b4_1_publikasi_ilmiah_dtps_Request $request)
    {
        m_3b4_1_publikasi_ilmiah_dtps::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
