<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_led_penilaian\Store_m_led_penilaian_Request;
use App\Http\Requests\m_led_penilaian\Update_m_led_penilaian_Request;
use App\Models\m_led_penilaian;

class c_led_penilaian extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);

        $m_led_penilaian = m_led_penilaian::all();

        return view('admin.m_led_penilaian.index', compact('m_led_penilaian'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        return view('admin.m_led_penilaian.create');
    }

    public function store(Store_m_led_penilaian_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_led_penilaian = m_led_penilaian::create($request->all());

        return redirect()->route('admin.r_led_penilaian.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_led_penilaian = m_led_penilaian::find($id);

        return view('admin.m_led_penilaian.edit', compact('m_led_penilaian'));
    }

    public function update(Update_m_led_penilaian_Request $request,  $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_led_penilaian = m_led_penilaian::find($id);
        $m_led_penilaian->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.r_led_penilaian.index')->with
        ($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_led_penilaian = m_led_penilaian::find($id);
        return view('admin.m_led_penilaian.show', compact('m_led_penilaian'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
        $m_led_penilaian = m_led_penilaian::find($id);
        $m_led_penilaian->delete();

        return back();
    }

    public function massDestroy(MassDestroy_m_led_penilaian_Request $request)
    {
        m_led_penilaian::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
