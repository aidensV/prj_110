<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_2a_seleksi_mahasiswa_baru\Store_m_2a_seleksi_mahasiswa_baru_Request;
use App\Http\Requests\m_2a_seleksi_mahasiswa_baru\Update_m_2a_seleksi_mahasiswa_baru_Request;
use App\m_lkps;
use App\Models\m_2a_seleksi_mahasiswa_baru;
use Illuminate\Support\Facades\Session;

class c_2a_seleksi_mahasiswa_baru extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::all();

        return view('admin.m_2a_seleksi_mahasiswa_baru.index', compact('m_2a_seleksi_mahasiswa_baru'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_2a_seleksi_mahasiswa_baru.create');
    }

    public function store(Store_m_2a_seleksi_mahasiswa_baru_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);
        $prodiId = Session::get('prodi_id');
        $request->merge([
            'prodi_id' => $prodiId
        ]);
        $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::create($request->all());
        $lkps = m_lkps::where('id',4)->first();
        $lkps->seleksiMahasiswa()->save($m_2a_seleksi_mahasiswa_baru);
        return redirect()->route('admin.r_2a_seleksi_mahasiswa_baru.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::find($id);
        // return $m_2a_seleksi_mahasiswa_baru->id;
        return view('admin.m_2a_seleksi_mahasiswa_baru.edit', compact('m_2a_seleksi_mahasiswa_baru'));
    }

    public function update(Update_m_2a_seleksi_mahasiswa_baru_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::find($id);
        $m_2a_seleksi_mahasiswa_baru->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_2a_seleksi_mahasiswa_baru.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::find($id);
        // return $m_2a_seleksi_mahasiswa_baru;
        return view('admin.m_2a_seleksi_mahasiswa_baru.show', compact('m_2a_seleksi_mahasiswa_baru'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_2a_seleksi_mahasiswa_baru = m_2a_seleksi_mahasiswa_baru::find($id);
            $m_2a_seleksi_mahasiswa_baru->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_2a_seleksi_mahasiswa_baru_Request $request)
    {
        m_2a_seleksi_mahasiswa_baru::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
