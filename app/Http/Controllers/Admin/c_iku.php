<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_iku\Store_m_iku_Request;
use App\Http\Requests\m_iku\Update_m_iku_Request;
use App\Models\m_borang;
use App\Models\m_iku;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class c_iku extends Controller
{
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        $m_iku = [];
        $elemntBorang = [];
        session(['strata' => $request->s]);
        $startDate = Carbon::now()->format('Y');
        $endDate = Carbon::now()->addYear(10)->format('Y');

        if($request->start_date){
            $startDate = Carbon::createFromFormat('Y',$request->start_date)->format('Y');
        }
        if($request->end_date){
            $endDate = Carbon::createFromFormat('Y',$request->end_date)->format('Y');
        }
            $m_iku = m_iku::whereBetWeen('tanggal',[$startDate,$endDate]);
            if($request->prodi_id){
                if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title != 'Staff'){
                    $m_iku = $m_iku->where('prodi_id',$request->prodi_id);
                }
                
            }
            if($request->s){
                $m_iku = $m_iku->where('strata',$request->s);
            }
            
            $m_iku = $m_iku->get();

            $elemntBorang = m_borang::where('prodi_id',$request->prodi_id)
          
            ->get();
        

        // if($request->borang_id){
        //     $m_iku = m_iku::where('prodi_id',$request->prodi_id)->where('element_id',$request->borang_id)
        //     ->where('strata',$request->s)
        //     ->whereBetWeen('created_at',[Carbon::parse($request->start_date)->startOfDay(),Carbon::parse($request->end_date)->endOfDay()])
        //     ->get();
        //     session(['borang_id' => $request->borang_id]);
        // }
        
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::whereHas('roles',function($q){
                $q->where('title','Staff');
            })->with('roles')->get();
        }
        return view('admin.m_iku.index', compact('m_iku','user','elemntBorang'));
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
        $strata = session()->get('strata');
        $request = $request->merge(['strata' => $strata]);
        
        $m_iku = m_iku::create($request->all());

        return redirect()->to('admin/r_iku?s='.$strata.'&prodi_id='.$m_iku->prodi_id.'&borang_id='.$m_iku->element_id);
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
        $strata = session()->get('strata');
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->to('admin/r_iku?s='.$strata.'&prodi_id='.$m_iku->prodi_id.'&borang_id='.$m_iku->element_id)->with($notification);
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
            if($request->type == 'jumlah'){
                $iku->jmlh = $request->nilai;
            }else if($request->type == 'nilai'){
                $iku->nilai = $request->nilai;

            }else{
                $iku->indikator = $request->nilai;
            }
           $iku->update();
           return response()->json(['status' => 'success'],200);
        }
        return response()->json(['status' => 'error'],400);
    }
}
