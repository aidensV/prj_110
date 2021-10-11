<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b7_1_luarn_pnltn_lainny_ptn\Store_m_3b7_1_luarn_pnltn_lainny_ptn_Request;
use App\Http\Requests\m_3b7_1_luarn_pnltn_lainny_ptn\Update_m_3b7_1_luarn_pnltn_lainny_ptn_Request;
use App\m_lkps;
use App\Models\m_3b7_1_luarn_pnltn_lainny_ptn;
use Illuminate\Support\Facades\Session;

class c_3b7_1_luarn_pnltn_lainny_ptn extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::all();

        return view('admin.m_3b7_1_luarn_pnltn_lainny_ptn.index', compact('m_3b7_1_luarn_pnltn_lainny_ptn'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b7_1_luarn_pnltn_lainny_ptn.create');
    }

    public function store(Store_m_3b7_1_luarn_pnltn_lainny_ptn_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::create($request->all());
        $lkps = m_lkps::where('id',18)->first();
        $lkps->luaranPenelitianLainnyaPtn()->save($m_3b7_1_luarn_pnltn_lainny_ptn);
        return redirect()->route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::find($id);

        return view('admin.m_3b7_1_luarn_pnltn_lainny_ptn.edit', compact('m_3b7_1_luarn_pnltn_lainny_ptn'));
    }

    public function update(Update_m_3b7_1_luarn_pnltn_lainny_ptn_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::find($id);
        $m_3b7_1_luarn_pnltn_lainny_ptn->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b7_1_luarn_pnltn_lainny_ptn.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::find($id);
        return view('admin.m_3b7_1_luarn_pnltn_lainny_ptn.show', compact('m_3b7_1_luarn_pnltn_lainny_ptn'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b7_1_luarn_pnltn_lainny_ptn = m_3b7_1_luarn_pnltn_lainny_ptn::find($id);
        $m_3b7_1_luarn_pnltn_lainny_ptn->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b7_1_luarn_pnltn_lainny_ptn_Request $request)
    {
        m_3b7_1_luarn_pnltn_lainny_ptn::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
