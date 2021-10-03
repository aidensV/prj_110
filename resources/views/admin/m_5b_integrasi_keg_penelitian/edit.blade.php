@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Integrasi Kegiatan Penelitian
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_5b_integrasi_keg_penelitian.update", [$m_5b_integrasi_keg_penelitian->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'judul_penelitian') ? 'has-error' : '' }}">
                <label for="judul_penelitian">Judul Penelitian</label>
                <input type="text" id="judul_penelitian" name="judul_penelitian" class="form-control" value="{{ old('judul_penelitian', isset($m_5b_integrasi_keg_penelitian) ? $m_5b_integrasi_keg_penelitian->judul_penelitian : '') }}">
                @if($errors->has('judul_penelitian'))
                    <p class="help-block">
                        {{ $errors->first('judul_penelitian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Judul Penelitian 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_5b_integrasi_keg_penelitian) ? $m_5b_integrasi_keg_penelitian->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'mata_kuliah') ? 'has-error' : '' }}">
                <label for="mata_kuliah">Mata Kuliah</label>
                <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control" value="{{ old('mata_kuliah', isset($m_5b_integrasi_keg_penelitian) ? $m_5b_integrasi_keg_penelitian->mata_kuliah : '') }}">
                @if($errors->has('mata_kuliah'))
                    <p class="help-block">
                        {{ $errors->first('mata_kuliah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Mata Kuliah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bentuk_integrasi') ? 'has-error' : '' }}">
                <label for="bentuk_integrasi">Bentuk Integrasi</label>
                <input type="text" id="bentuk_integrasi" name="bentuk_integrasi" class="form-control" value="{{ old('bentuk_integrasi', isset($m_5b_integrasi_keg_penelitian) ? $m_5b_integrasi_keg_penelitian->bentuk_integrasi : '') }}">
                @if($errors->has('bentuk_integrasi'))
                    <p class="help-block">
                        {{ $errors->first('bentuk_integrasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bentuk Integrasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_5b_integrasi_keg_penelitian) ? $m_5b_integrasi_keg_penelitian->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tahun
                </p> -->
            </div>
            <div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection