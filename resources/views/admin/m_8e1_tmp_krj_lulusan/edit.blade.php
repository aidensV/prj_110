@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tempat Kerja Lulusan
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8e1_tmp_krj_lulusan.update", [$m_8e1_tmp_krj_lulusan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('tahun_lulus') ? 'has-error' : '' }}">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->tahun_lulus : '') }}">
                @if($errors->has('tahun_lulus'))
                    <p class="help-block">
                        {{ $errors->first('tahun_lulus') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan">Jumlah Lulusan</label>
                <input type="text" id="jmlh_lulusan" name="jmlh_lulusan" class="form-control" value="{{ old('jmlh_lulusan', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->jmlh_lulusan : '') }}">
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
                <input type="text" id="jmlh_lulusan_terlacak" name="jmlh_lulusan_terlacak" class="form-control" value="{{ old('jmlh_lulusan_terlacak', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_terlacak_lokal') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_terlacak_lokal">Jumlah Lulusan Terlacak Lokal</label>
                <input type="text" id="jmlh_lulusan_terlacak_lokal" name="jmlh_lulusan_terlacak_lokal" class="form-control" value="{{ old('jmlh_lulusan_terlacak_lokal', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_lokal : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak_lokal'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak_lokal') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_terlacak_nasional') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_terlacak_nasional">Jumlah Lulusan Terlacak Nasional</label>
                <input type="text" id="jmlh_lulusan_terlacak_nasional" name="jmlh_lulusan_terlacak_nasional" class="form-control" value="{{ old('jmlh_lulusan_terlacak_nasional', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_nasional : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak_nasional'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak_nasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_lulusan_terlacak_internasional') ? 'has-error' : '' }}">
                <label for="jmlh_lulusan_terlacak_internasional">Jumlah Lulusan Terlacak Internasional</label>
                <input type="text" id="jmlh_lulusan_terlacak_internasional" name="jmlh_lulusan_terlacak_internasional" class="form-control" value="{{ old('jmlh_lulusan_terlacak_internasional', isset($m_8e1_tmp_krj_lulusan) ? $m_8e1_tmp_krj_lulusan->jmlh_lulusan_terlacak_internasional : '') }}">
                @if($errors->has('jmlh_lulusan_terlacak_internasional'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_lulusan_terlacak_internasional') }}
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