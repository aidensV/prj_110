@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Masa Studi Lulusan Doktor
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8c_masastudi_lllsn_dok.update", [$m_8c_masastudi_lllsn_dok->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('thn_msk') ? 'has-error' : '' }}">
                <label for="thn_msk">Tahun Masuk</label>
                <input type="text" id="thn_msk" name="thn_msk" class="form-control" value="{{ old('thn_msk', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->thn_msk : '') }}">
                @if($errors->has('thn_msk'))
                    <p class="help-block">
                        {{ $errors->first('thn_msk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_diterima') ? 'has-error' : '' }}">
                <label for="jml_mhs_diterima">Jumlah Mahasiswa yang Diterima</label>
                <input type="text" id="jml_mhs_diterima" name="jml_mhs_diterima" class="form-control" value="{{ old('jml_mhs_diterima', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_mhs_diterima : '') }}">
                @if($errors->has('jml_mhs_diterima'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_diterima') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_lulus_ts3') ? 'has-error' : '' }}">
                <label for="jml_mhs_lulus_ts3">Jumlah Mahasiswa Lulus TS3</label>
                <input type="text" id="jml_mhs_lulus_ts3" name="jml_mhs_lulus_ts3" class="form-control" value="{{ old('jml_mhs_lulus_ts3', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_mhs_lulus_ts3 : '') }}">
                @if($errors->has('jml_mhs_lulus_ts3'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_lulus_ts3') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_lulus_ts2') ? 'has-error' : '' }}">
                <label for="jml_mhs_lulus_ts2">Jumlah Mahasiswa Lulus TS2</label>
                <input type="text" id="jml_mhs_lulus_ts2" name="jml_mhs_lulus_ts2" class="form-control" value="{{ old('jml_mhs_lulus_ts2', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_mhs_lulus_ts2 : '') }}">
                @if($errors->has('jml_mhs_lulus_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_lulus_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_lulus_ts1') ? 'has-error' : '' }}">
                <label for="jml_mhs_lulus_ts1">Jumlah Mahasiswa Lulus TS1</label>
                <input type="text" id="jml_mhs_lulus_ts1" name="jml_mhs_lulus_ts1" class="form-control" value="{{ old('jml_mhs_lulus_ts1', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_mhs_lulus_ts1 : '') }}">
                @if($errors->has('jml_mhs_lulus_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_lulus_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_lulus_ts') ? 'has-error' : '' }}">
                <label for="jml_mhs_lulus_ts">Jumlah Mahasiswa Lulus TS</label>
                <input type="text" id="jml_mhs_lulus_ts" name="jml_mhs_lulus_ts" class="form-control" value="{{ old('jml_mhs_lulus_ts', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_mhs_lulus_ts : '') }}">
                @if($errors->has('jml_mhs_lulus_ts'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_lulus_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_lulusan_akhir_ts') ? 'has-error' : '' }}">
                <label for="jml_lulusan_akhir_ts">Jumlah Lulusan Akhir TS</label>
                <input type="text" id="jml_lulusan_akhir_ts" name="jml_lulusan_akhir_ts" class="form-control" value="{{ old('jml_lulusan_akhir_ts', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->jml_lulusan_akhir_ts : '') }}">
                @if($errors->has('jml_lulusan_akhir_ts'))
                    <p class="help-block">
                        {{ $errors->first('jml_lulusan_akhir_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('rata_masa_studi') ? 'has-error' : '' }}">
                <label for="rata_masa_studi">Rata-rata Masa Studi</label>
                <input type="text" id="rata_masa_studi" name="rata_masa_studi" class="form-control" value="{{ old('rata_masa_studi', isset($m_8c_masastudi_lllsn_dok) ? $m_8c_masastudi_lllsn_dok->rata_masa_studi : '') }}">
                @if($errors->has('rata_masa_studi'))
                    <p class="help-block">
                        {{ $errors->first('rata_masa_studi') }}
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