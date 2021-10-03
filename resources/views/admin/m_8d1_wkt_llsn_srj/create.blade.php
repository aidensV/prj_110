@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Waktu Tunggu Lulusan Sarjana
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_8d1_wkt_llsn_srj.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('thn_lulus') ? 'has-error' : '' }}">
                <label for="thn_lulus">Tahun Lulusan</label>
                <input type="text" id="thn_lulus" name="thn_lulus" class="form-control" value="{{ old('thn_lulus', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->thn_lulus : '') }}">
                @if($errors->has('thn_lulus'))
                    <p class="help-block">
                        {{ $errors->first('thn_lulus') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan">Jumlah Lulusan</label>
                <input type="text" id="jmlh_lulusan" name="jmlh_lulusan" class="form-control" value="{{ old('jmlh_lulusan', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->jmlh_lulusan : '') }}">
                @if($errors->has('jmlh_lulusan'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_terlacak') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_terlacak">Jumlah Lulusan Terlacak</label>
                <input type="text" id="jmlh_lulusan_terlacak" name="jmlh_lulusan_terlacak" class="form-control" value="{{ old('jmlh_lulusan_terlacak', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->jmlh_lulusan_terlacak : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_krg6bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_krg6bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan < 6bln</label>
                <input type="text" id="jmlh_lulusan_wt_krg6bln" name="jmlh_lulusan_wt_krg6bln" class="form-control" value="{{ old('jmlh_lulusan_wt_krg6bln', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->jmlh_lulusan_wt_krg6bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_krg6bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_krg6bln') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_6smp18bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_6smp18bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan 6-18bln</label>
                <input type="text" id="jmlh_lulusan_wt_6smp18bln" name="jmlh_lulusan_wt_6smp18bln" class="form-control" value="{{ old('jmlh_lulusan_wt_6smp18bln', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->jmlh_lulusan_wt_6smp18bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_6smp18bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_6smp18bln') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_lbh18bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_lbh18bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan >18bln</label>
                <input type="text" id="jmlh_lulusan_wt_lbh18bln" name="jmlh_lulusan_wt_lbh18bln" class="form-control" value="{{ old('jmlh_lulusan_wt_lbh18bln', isset($m_8d1_wkt_llsn_srj) ? $m_8d1_wkt_llsn_srj->jmlh_lulusan_wt_lbh18bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_lbh18bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_lbh18bln') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection