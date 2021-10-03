<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_lkps_penilaian\Store_m_lkps_penilaian_Request;
use App\Http\Requests\m_lkps_penilaian\Update_m_lkps_penilaian_Request;
use App\m_lkps;
use App\Models\m_lkps_penilaian;

class c_lkps_penilaian extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_lkps_penilaian = m_lkps_penilaian::all();

        return view('admin.m_lkps_penilaian.index', compact('m_lkps_penilaian'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_lkps_penilaian.create');
    }

    public function store(Store_m_lkps_penilaian_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_lkps_penilaian = m_lkps_penilaian::create($request->all());

        return redirect()->route('admin.r_lkps_penilaian.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_lkps_penilaian = m_lkps_penilaian::find($id);

        return view('admin.m_lkps_penilaian.edit', compact('m_lkps_penilaian'));
    }

    public function update(Update_m_lkps_penilaian_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_lkps_penilaian = m_lkps_penilaian::find($id);
        $m_lkps_penilaian->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_lkps_penilaian.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_lkps_penilaian = m_lkps_penilaian::find($id);
        return view('admin.m_lkps_penilaian.show', compact('m_lkps_penilaian'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_lkps_penilaian = m_lkps_penilaian::find($id);
        $m_lkps_penilaian->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_lkps_penilaian_Request $request)
    {
        m_lkps_penilaian::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function daftar_lkps()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $listlkps = m_lkps::all();
        
        return view('admin.m_lkps_penilaian.daftar_lkps',compact('listlkps'));
    }

    public function changeNilai(Request $request)
    {
        $m_lkps_penilaian = m_lkps::where('id',$request->id)->first();
        if($m_lkps_penilaian){
            $m_lkps_penilaian->nilai = $request->nilai;
            $m_lkps_penilaian->update();
            return response()->json([
                'status' => 'success',
                'data' => $m_lkps_penilaian
            ],200);
        }else{
            return response()->json([
                'status' => 'error',
                'data' => $request->id
            ],400);
        }
        
    }
}
