@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kerjasama Pendidikan
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_1_1_kerjasama_pendidikan.update", [$m_1_1_kerjasama_pendidikan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="form-group {{ $errors->has('lembaga_mitra') ? 'has-error' : '' }}">
                <label for="lembaga_mitra">Lembaga Mitra</label>
                <input type="text" id="lembaga_mitra" name="lembaga_mitra" class="form-control" value="{{ old('lembaga_mitra', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->lembaga_mitra : '') }}">
                @if($errors->has('lembaga_mitra'))
                    <p class="help-block">
                        {{ $errors->first('lembaga_mitra') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_internasional') ? 'has-error' : '' }}">
                <label for="tingkat_internasional">Tingkat Internasional</label>
                <input type="text" id="tingkat_internasional" name="tingkat_internasional" class="form-control" value="{{ old('tingkat_internasional', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->tingkat_internasional : '') }}">
                @if($errors->has('tingkat_internasional'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_internasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_nasional') ? 'has-error' : '' }}">
                <label for="tingkat_nasional">Tingkat Nasional</label>
                <input type="text" id="tingkat_nasional" name="tingkat_nasional" class="form-control" value="{{ old('tingkat_nasional', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->tingkat_nasional : '') }}">
                @if($errors->has('tingkat_nasional'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_nasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_wilayah') ? 'has-error' : '' }}">
                <label for="tingkat_wilayah">Tingkat Wilayah</label>
                <input type="text" id="tingkat_wilayah" name="tingkat_wilayah" class="form-control" value="{{ old('tingkat_wilayah', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->tingkat_wilayah : '') }}">
                @if($errors->has('tingkat_wilayah'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_wilayah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('judul_kegiatan_kerjasama') ? 'has-error' : '' }}">
                <label for="judul_kegiatan_kerjasama">Judul Kegiatan Kerjasama</label>
                <input type="text" id="judul_kegiatan_kerjasama" name="judul_kegiatan_kerjasama" class="form-control" value="{{ old('judul_kegiatan_kerjasama', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->judul_kegiatan_kerjasama : '') }}">
                @if($errors->has('judul_kegiatan_kerjasama'))
                    <p class="help-block">
                        {{ $errors->first('judul_kegiatan_kerjasama') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('manfaat_bagi_ps') ? 'has-error' : '' }}">
                <label for="manfaat_bagi_ps">Manfaat bagi Program Studi</label>
                <input type="text" id="manfaat_bagi_ps" name="manfaat_bagi_ps" class="form-control" value="{{ old('manfaat_bagi_ps', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->manfaat_bagi_ps : '') }}">
                @if($errors->has('manfaat_bagi_ps'))
                    <p class="help-block">
                        {{ $errors->first('manfaat_bagi_ps') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan manfaat bagi PS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('waktu_dan_durasi') ? 'has-error' : '' }}">
                <label for="waktu_dan_durasi">Waktu dan Durasi</label>
                <input type="text" id="waktu_dan_durasi" name="waktu_dan_durasi" class="form-control" value="{{ old('waktu_dan_durasi', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->waktu_dan_durasi : '') }}">
                @if($errors->has('waktu_dan_durasi'))
                    <p class="help-block">
                        {{ $errors->first('waktu_dan_durasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan waktu dan durasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tahun_berakhirnya_kerjasama') ? 'has-error' : '' }}">
                <label for="tahun_berakhirnya_kerjasama">Tahun Berakhirnya Kerjasama</label>
                <input type="text" id="tahun_berakhirnya_kerjasama" name="tahun_berakhirnya_kerjasama" class="form-control" value="{{ old('tahun_berakhirnya_kerjasama', isset($m_1_1_kerjasama_pendidikan) ? $m_1_1_kerjasama_pendidikan->tahun_berakhirnya_kerjasama : '') }}">
                @if($errors->has('tahun_berakhirnya_kerjasama'))
                    <p class="help-block">
                        {{ $errors->first('tahun_berakhirnya_kerjasama') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('bukti_kerjasama') ? 'has-error' : '' }}">
                    <label for="semester">Bukti<span class="text-danger"><span class="text-danger">*</span></span></label>
                    <div class="custom-file">
                        <input name="bukti_kerjasama" id="file-upload" onclick="change_fileName(this)" type="file" class="custom-file-input @error('file') is-invalid @enderror" aria-describedby="inputGroupFile01" lang="in">
                        <label class="custom-file-label" for="file">{{$m_1_1_kerjasama_pendidikan->bukti_kerjasama}}</label>
                    </div>
                    @if($errors->has('bukti_kerjasama'))
                    <p class="help-block text-danger">
                        <strong>{{ $errors->first('bukti_kerjasama') }}</strong>
                    </p>
                    @endif
                </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection