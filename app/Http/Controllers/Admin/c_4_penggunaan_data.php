<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_4_penggunaan_data\Store_m_4_penggunaan_data_Request;
use App\Http\Requests\m_4_penggunaan_data\Update_m_4_penggunaan_data_Request;
use App\m_lkps;
use App\Models\m_4_penggunaan_data;
use Illuminate\Support\Facades\Session;

class c_4_penggunaan_data extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_4_penggunaan_data = m_4_penggunaan_data::all();

        return view('admin.m_4_penggunaan_data.index', compact('m_4_penggunaan_data'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_4_penggunaan_data.create');
    }

    public function store(Store_m_4_penggunaan_data_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_4_penggunaan_data = m_4_penggunaan_data::create($request->all());
        $lkps = m_lkps::where('id',22)->first();
        $lkps->penggunaanData()->save($m_4_penggunaan_data);
        return redirect()->route('admin.r_4_penggunaan_data.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_4_penggunaan_data = m_4_penggunaan_data::find($id);

        return view('admin.m_4_penggunaan_data.edit', compact('m_4_penggunaan_data'));
    }

    public function update(Update_m_4_penggunaan_data_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_4_penggunaan_data = m_4_penggunaan_data::find($id);
        $m_4_penggunaan_data->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_4_penggunaan_data.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_4_penggunaan_data = m_4_penggunaan_data::find($id);
        return view('admin.m_4_penggunaan_data.show', compact('m_4_penggunaan_data'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_4_penggunaan_data = m_4_penggunaan_data::find($id);
        $m_4_penggunaan_data->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_4_penggunaan_data_Request $request)
    {
        m_4_penggunaan_data::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
