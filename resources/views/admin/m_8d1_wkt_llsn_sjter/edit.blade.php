@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Waktu Tunggu Lulusan Sarjana Terapan
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8d1_wkt_llsn_sjter.update", [$m_8d1_wkt_llsn_sjter->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('thn_lulus') ? 'has-error' : '' }}">
                <label for="thn_lulus">Tahun Lulusan</label>
                <input type="text" id="thn_lulus" name="thn_lulus" class="form-control" value="{{ old('thn_lulus', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->thn_lulus : '') }}">
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
                <input type="text" id="jmlh_lulusan" name="jmlh_lulusan" class="form-control" value="{{ old('jmlh_lulusan', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->jmlh_lulusan : '') }}">
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
                <input type="text" id="jmlh_lulusan_terlacak" name="jmlh_lulusan_terlacak" class="form-control" value="{{ old('jmlh_lulusan_terlacak', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->jmlh_lulusan_terlacak : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_krg3bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_krg3bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan < 3bln</label>
                <input type="text" id="jmlh_lulusan_wt_krg3bln" name="jmlh_lulusan_wt_krg3bln" class="form-control" value="{{ old('jmlh_lulusan_wt_krg3bln', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->jmlh_lulusan_wt_krg3bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_krg3bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_krg3bln') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_3smp6bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_3smp6bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan 3-6bln</label>
                <input type="text" id="jmlh_lulusan_wt_3smp6bln" name="jmlh_lulusan_wt_3smp6bln" class="form-control" value="{{ old('jmlh_lulusan_wt_3smp6bln', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->jmlh_lulusan_wt_3smp6bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_3smp6bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_3smp6bln') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_wt_lbh6bln') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_wt_lbh6bln">Jumlah Lulusan Terlacak dg Waktu Tunggu Mendapatkan Pekerjaan >6bln</label>
                <input type="text" id="jmlh_lulusan_wt_lbh6bln" name="jmlh_lulusan_wt_lbh6bln" class="form-control" value="{{ old('jmlh_lulusan_wt_lbh6bln', isset($m_8d1_wkt_llsn_sjter) ? $m_8d1_wkt_llsn_sjter->jmlh_lulusan_wt_lbh6bln : '') }}">
                @if($errors->has('jmlh_lulusan_wt_lbh6bln'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_wt_lbh6bln') }}
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