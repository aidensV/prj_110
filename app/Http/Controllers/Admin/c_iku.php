<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_iku\Store_m_iku_Request;
use App\Http\Requests\m_iku\Update_m_iku_Request;
use App\Models\m_iku;
use App\User;
use Illuminate\Support\Facades\Auth;

class c_iku extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        $m_iku = [];
        if($request->prodi_id){
            $m_iku = m_iku::where('prodi_id',$request->prodi_id)->get();
        }
        
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::all();
        }
        return view('admin.m_iku.index', compact('m_iku','user'));
    }

    public function create(Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $prodi_id = $request->prodi_id;
        $prodi_name = $request->prodi_name;

        return view('admin.m_iku.create',compact('prodi_id','prodi_name'));
    }

    public function store(Store_m_iku_Request $request)
    {
        abort_unless(\Gate::allows('lkps_create'), 403);

        $m_iku = m_iku::create($request->all());

        return redirect()->to('admin/r_iku?prodi_id='.$request->prodi_id);
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_iku = m_iku::find($id);
        // return $m_iku->id;
        return view('admin.m_iku.edit', compact('m_iku'));
    }

    public function update(Update_m_iku_Request $request, $id)
    {
        abort_unless(\Gate::allows('lkps_edit'), 403);
        $m_iku = m_iku::find($id);
        $m_iku->update($request->all());

        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/r_iku?prodi_id='.$m_iku->prodi_id)->with($notification);
    }

    public function show($id)
    {
        abort_unless(\Gate::allows('lkps_show'), 403);
        $m_iku = m_iku::find($id);
        // return $m_iku;
        return view('admin.m_iku.show', compact('m_iku'));
    }

    public function destroy($id)
    {
        abort_unless(\Gate::allows('lkps_delete'), 403);
            $m_iku = m_iku::find($id);
            $m_iku->delete();
            return back();
        
        // return back();
    }

    public function massDestroy(MassDestroy_m_iku_Request $request)
    {
        m_iku::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function changeValue(Request $request)
    {
        $iku = m_iku::where('id', $request->id)->first();
        if($iku){
           $iku->nilai = $request->nilai;
           $iku->update();
           return response()->json(['status' => 'success'],200);
        }
        return response()->json(['status' => 'error'],400);
    }
}
