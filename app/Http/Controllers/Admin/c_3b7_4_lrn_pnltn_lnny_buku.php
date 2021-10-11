<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_3b7_4_lrn_pnltn_lnny_buku\Store_m_3b7_4_lrn_pnltn_lnny_buku_Request;
use App\Http\Requests\m_3b7_4_lrn_pnltn_lnny_buku\Update_m_3b7_4_lrn_pnltn_lnny_buku_Request;
use App\m_lkps;
use App\Models\m_3b7_4_lrn_pnltn_lnny_buku;
use Illuminate\Support\Facades\Session;

class c_3b7_4_lrn_pnltn_lnny_buku extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::all();

        return view('admin.m_3b7_4_lrn_pnltn_lnny_buku.index', compact('m_3b7_4_lrn_pnltn_lnny_buku'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_3b7_4_lrn_pnltn_lnny_buku.create');
    }

    public function store(Store_m_3b7_4_lrn_pnltn_lnny_buku_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::create($request->all());
        $lkps = m_lkps::where('id',21)->first();
        $lkps->luaranPenelitianLainnyaBuku()->save($m_3b7_4_lrn_pnltn_lnny_buku);
        return redirect()->route('admin.r_3b7_4_lrn_pnltn_lnny_buku.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        
        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::find($id);
       
        return view('admin.m_3b7_4_lrn_pnltn_lnny_buku.edit', compact('m_3b7_4_lrn_pnltn_lnny_buku'));
    }

    public function update(Update_m_3b7_4_lrn_pnltn_lnny_buku_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::find($id);
        $m_3b7_4_lrn_pnltn_lnny_buku->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_3b7_4_lrn_pnltn_lnny_buku.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::find($id);
        return view('admin.m_3b7_4_lrn_pnltn_lnny_buku.show', compact('m_3b7_4_lrn_pnltn_lnny_buku'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_3b7_4_lrn_pnltn_lnny_buku = m_3b7_4_lrn_pnltn_lnny_buku::find($id);
        $m_3b7_4_lrn_pnltn_lnny_buku->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_3b7_4_lrn_pnltn_lnny_buku_Request $request)
    {
        m_3b7_4_lrn_pnltn_lnny_buku::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
