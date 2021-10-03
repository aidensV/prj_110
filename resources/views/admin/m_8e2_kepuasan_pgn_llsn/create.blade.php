@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kepuasan Pengguna Lulusan
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_8e2_kepuasan_pgn_llsn.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('jenis_kemampuan') ? 'has-error' : '' }}">
                <label for="jenis_kemampuan">Jenis Kemampuan</label>
                <input type="text" id="jenis_kemampuan" name="jenis_kemampuan" class="form-control" value="{{ old('jenis_kemampuan', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->jenis_kemampuan : '') }}">
                @if($errors->has('jenis_kemampuan'))
                    <p class="help-block">
                        {{ $errors->first('jenis_kemampuan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_kep_peng_sb') ? 'has-error' : '' }}">
                <label for="tingkat_kep_peng_sb">Tingkat Kepuasan Pengguna Sangat Baik</label>
                <input type="text" id="tingkat_kep_peng_sb" name="tingkat_kep_peng_sb" class="form-control" value="{{ old('tingkat_kep_peng_sb', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_sb : '') }}">
                @if($errors->has('tingkat_kep_peng_sb'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kep_peng_sb') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_kep_peng_b') ? 'has-error' : '' }}">
                <label for="tingkat_kep_peng_b">Tingkat Kepuasan Pengguna Baik</label>
                <input type="text" id="tingkat_kep_peng_b" name="tingkat_kep_peng_b" class="form-control" value="{{ old('tingkat_kep_peng_b', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_b : '') }}">
                @if($errors->has('tingkat_kep_peng_b'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kep_peng_b') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_kep_peng_c') ? 'has-error' : '' }}">
                <label for="tingkat_kep_peng_c">Tingkat Kepuasan Pengguna Cukup</label>
                <input type="text" id="tingkat_kep_peng_c" name="tingkat_kep_peng_c" class="form-control" value="{{ old('tingkat_kep_peng_c', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_c : '') }}">
                @if($errors->has('tingkat_kep_peng_c'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kep_peng_c') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_kep_peng_k') ? 'has-error' : '' }}">
                <label for="tingkat_kep_peng_k">Tingkat Kepuasan Pengguna Kurang</label>
                <input type="text" id="tingkat_kep_peng_k" name="tingkat_kep_peng_k" class="form-control" value="{{ old('tingkat_kep_peng_k', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->tingkat_kep_peng_k : '') }}">
                @if($errors->has('tingkat_kep_peng_k'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kep_peng_k') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('rcn_tdk_lanjut_oleh_upps') ? 'has-error' : '' }}">
                <label for="rcn_tdk_lanjut_oleh_upps">Rencana Tindak Lanjut Oleh UPPS</label>
                <input type="text" id="rcn_tdk_lanjut_oleh_upps" name="rcn_tdk_lanjut_oleh_upps" class="form-control" value="{{ old('rcn_tdk_lanjut_oleh_upps', isset($m_8e2_kepuasan_pgn_llsn) ? $m_8e2_kepuasan_pgn_llsn->rcn_tdk_lanjut_oleh_upps : '') }}">
                @if($errors->has('rcn_tdk_lanjut_oleh_upps'))
                    <p class="help-block">
                        {{ $errors->first('rcn_tdk_lanjut_oleh_upps') }}
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