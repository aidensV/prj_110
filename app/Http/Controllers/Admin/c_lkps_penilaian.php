<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\m_lkps_penilaian\Store_m_lkps_penilaian_Request;
use App\Http\Requests\m_lkps_penilaian\Update_m_lkps_penilaian_Request;
use App\lkpsables;
use App\m_lkps;
use App\Models\m_lkps_penilaian;
use App\penilaian_lkps;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class c_lkps_penilaian extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('lkps_access'), 403);
        
        $m_lkps_penilaian = m_lkps_penilaian::all();
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
        }else{
            $user= User::all();
        }
        return view('admin.m_lkps_penilaian.index', compact('m_lkps_penilaian','user'));
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

    public function daftar_lkps(Request $request)
    {
        
        abort_unless(\Gate::allows('lkps_access'), 403);
        // $listlkps = [];
        // $listlkps = m_lkps::whereHas('kerjasamaPendidikan',function($q){
        //     $q->where('prodi_id',7);
        // })->orWhereHas('kerjasamaPengapdianMasyarakat',function($q){
        //     $q->where('prodi_id',7);
        // })->with('kerjasamaPendidikan')
        // ->get();
        // dd($listlkps[0]->kerjasamaPendidikan[0]->pivot);
      
        
        // foreach ($lkps as $key => $value) {
        //     switch ($value->id) {
        //         case '1':
        //             DB::table('1_1_kerjasama_pendidikan')::where('')
        //             // array_push($listlkps,)
        //             break;
                
        //         default:
        //             # code...
        //             break;
        //     }
        // }
        $prodiId = Session::get('prodi_id');
        if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff'){
            $user= User::where('id',Auth::user()->id)->get();
            $listlkps = m_lkps::all();
        
        }else{
            $user= User::whereHas('roles',function($q){
                $q->where('title','Staff');
            })->with('roles')->get();
            
            $listlkps = m_lkps::whereHas('kerjasamaPendidikan',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })->orWhereHas('kerjasamaPengapdianMasyarakat',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('seleksiMahasiswa',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('dosenTetepaPT',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('dosePemUtama',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('dosenTidakTeteap',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('dosenIndustri',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('penelitianDtps',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('publikasiIlmiahDtps',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('pagelaranIlmiahDtps',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('karyaIlmiahDtps',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('produkIlmiahYangDiadopsi',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('luaranPenelitianLainnyaPtn',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('luaranPenelitianLainnyaTeknologiCpt',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('luaranPenelitianLainnyaBuku',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('penggunaanData',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('kurikulumCapaianPjr',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('integrasiPenelitian',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('kepusanMahasiswa',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('penelitianDtpsYgMelibatkanMhs',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('dtpsYgJdRujukanTmTss',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('pkmDtpsYgMelibatkanMhs',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('ipkLulusan',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('prestasiAkademik',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('prestaisNonAkademik',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('masaStudiLlsnDok',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('masaStudiLlsnDiploma',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('masaStudiLlsnMagister',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('masaStudiLlsnSarjana',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('waktuLulusanDiploma',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('waktuLulusanSarjanaTerapan',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('waktuLulusanSarjana',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('tmptKerjaLulusan',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('kepuasanPenggunaLulusan',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            // ->orWhereHas('publikasiIlmiahMhs',function($q) use($prodiId){
            //     $q->where('prodi_id',$prodiId);
            // })
            ->orWhereHas('karyaIlmiahMhsDisitasi',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('pagelaranIlmiahMhs',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->orWhereHas('produkDtps',function($q) use($prodiId){
                $q->where('prodi_id',$prodiId);
            })
            ->leftJoin('penilaian_lkps',function($q)use($prodiId){
                $q->on('id','lkps_id');
                $q->where('prodi_id',$prodiId);
            })
            // ->where(function($q)use($prodiId){
            //     $q->where('prodi_id',$prodiId);
            // })
            ->get();
            
        }
        
        return view('admin.m_lkps_penilaian.daftar_lkps',compact('listlkps','user'));
    }

    public function changeNilai(Request $request)
    {
        $prodiId = $request->prodi_id;
        $m_lkps_penilaian = penilaian_lkps::where('prodi_id',$prodiId)
        ->where('lkps_id',$request->id)
        ->first();
        if($m_lkps_penilaian){
            $m_lkps_penilaian->value = $request->nilai;
            $m_lkps_penilaian->update();
            return response()->json([
                'status' => 'success',
                'data' => $m_lkps_penilaian
            ],200);
        }else{
            $m_lkps_penilaian = new penilaian_lkps();
            $m_lkps_penilaian->prodi_id = $prodiId;
            $m_lkps_penilaian->lkps_id = $request->id;
            $m_lkps_penilaian->value = $request->nilai;
            $m_lkps_penilaian->save();
            return response()->json([
                'status' => 'success1',
                'data' => $m_lkps_penilaian
            ],200);
        }
        
    }
}
