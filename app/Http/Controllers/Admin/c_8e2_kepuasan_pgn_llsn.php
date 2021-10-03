<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_8e2_kepuasan_pgn_llsn\Store_m_8e2_kepuasan_pgn_llsn_Request;
use App\Http\Requests\m_8e2_kepuasan_pgn_llsn\Update_m_8e2_kepuasan_pgn_llsn_Request;
use App\Models\m_8e2_kepuasan_pgn_llsn;

class c_8e2_kepuasan_pgn_llsn extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::all();

        return view('admin.m_8e2_kepuasan_pgn_llsn.index', compact('m_8e2_kepuasan_pgn_llsn'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_8e2_kepuasan_pgn_llsn.create');
    }

    public function store(Store_m_8e2_kepuasan_pgn_llsn_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::create($request->all());

        return redirect()->route('admin.r_8e2_kepuasan_pgn_llsn.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::find($id);
        // return $m_8e2_kepuasan_pgn_llsn->id;
        return view('admin.m_8e2_kepuasan_pgn_llsn.edit', compact('m_8e2_kepuasan_pgn_llsn'));
    }

    public function update(Update_m_8e2_kepuasan_pgn_llsn_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::find($id);
        $m_8e2_kepuasan_pgn_llsn->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_8e2_kepuasan_pgn_llsn.index')->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::find($id);
        // return $m_8e2_kepuasan_pgn_llsn;
        return view('admin.m_8e2_kepuasan_pgn_llsn.show', compact('m_8e2_kepuasan_pgn_llsn'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_8e2_kepuasan_pgn_llsn = m_8e2_kepuasan_pgn_llsn::find($id);
            $m_8e2_kepuasan_pgn_llsn->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_8e2_kepuasan_pgn_llsn_Request $request)
    {
        m_8e2_kepuasan_pgn_llsn::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
