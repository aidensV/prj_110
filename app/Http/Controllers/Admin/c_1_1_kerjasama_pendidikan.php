<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_1_1_kerjasama_pendidikan\Store_m_1_1_kerjasama_pendidikan_Request;
use App\Http\Requests\m_1_1_kerjasama_pendidikan\Update_m_1_1_kerjasama_pendidikan_Request;
use App\Models\m_1_1_kerjasama_pendidikan;

class c_1_1_kerjasama_pendidikan extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::all();

        return view('admin.m_1_1_kerjasama_pendidikan.index', compact('m_1_1_kerjasama_pendidikan'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_1_1_kerjasama_pendidikan.create');
    }

    public function store(Store_m_1_1_kerjasama_pendidikan_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $get_file = $request->file('bukti_kerjasama');
		$file_name = time()."_".$get_file->getClientOriginalName();
		$upload_to = 'file_record/';
        $get_file->move($upload_to,$file_name);
        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::create([
            'tingkat_internasional' =>$request->tingkat_internasional,
            'tingkat_nasional' =>$request->tingkat_nasional,
            'tingkat_wilayah' =>$request->tingkat_wilayah,
            'judul_kegiatan_kerjasama' =>$request->judul_kegiatan_kerjasama,
            'manfaat_bagi_ps' =>$request->manfaat_bagi_ps,
            'waktu_dan_durasi' =>$request->waktu_dan_durasi,
            'tahun_berakhirnya_kerjasama' =>$request->tahun_berakhirnya_kerjasama,
            'lembaga_mitra' =>$request->lembaga_mitra,
            'bukti_kerjasama' =>$file_name,
        ]);
        $notification = array(
            'message' => 'LKPS Berhasil ditambahkan!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.r_1_1_kerjasama_pendidikan.index')->with($notification);
        // return $upload_to;
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::find($id);
        // return $m_1_1_kerjasama_pendidikan->id;
        return view('admin.m_1_1_kerjasama_pendidikan.edit', compact('m_1_1_kerjasama_pendidikan'));
    }

    public function update(Update_m_1_1_kerjasama_pendidikan_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::find($id);
        $m_1_1_kerjasama_pendidikan->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_1_1_kerjasama_pendidikan.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::find($id);
        // return $m_1_1_kerjasama_pendidikan;
        return view('admin.m_1_1_kerjasama_pendidikan.show', compact('m_1_1_kerjasama_pendidikan'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_1_1_kerjasama_pendidikan = m_1_1_kerjasama_pendidikan::find($id);
        $m_1_1_kerjasama_pendidikan->delete();

        return back();
    }
 
    public function massDestroy(MassDestroy_m_1_1_kerjasama_pendidikan_Request $request)
    {
        m_1_1_kerjasama_pendidikan::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
