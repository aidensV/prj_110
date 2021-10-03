@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Elemen LKPS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_elemen_lkps.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'kriteria') ? 'has-error' : '' }}">
                <label for="kriteria">Kriteria</label>
                <input type="text" id="kriteria" name="kriteria" class="form-control" value="{{ old('kriteria', isset($m_elemen_lkps) ? $m_elemen_lkps->velemen : '') }}">
                @if($errors->has('kriteria'))
                    <p class="help-block">
                        {{ $errors->first('kriteria') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'deskripsi') ? 'has-error' : '' }}">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="{{ old('deskripsi', isset($m_elemen_lkps) ? $m_elemen_lkps->deskripsi : '') }}">
                @if($errors->has('deskripsi'))
                    <p class="help-block">
                        {{ $errors->first('deskripsi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot') ? 'has-error' : '' }}">
                <label for="bobot">Bobot</label>
                <input type="text" id="bobot" name="bobot" class="form-control" value="{{ old('bobot', isset($m_elemen_lkps) ? $m_elemen_lkps->bobot : '') }}">
                @if($errors->has('bobot'))
                    <p class="help-block">
                        {{ $errors->first('bobot') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'kode_tabel') ? 'has-error' : '' }}">
                <label for="kode_tabel">Kode Tabel</label>
                <input type="text" id="kode_tabel" name="kode_tabel" class="form-control" value="{{ old('kode_tabel', isset($m_elemen_lkps) ? $m_elemen_lkps->kode_tabel : '') }}">
                @if($errors->has('kode_tabel'))
                    <p class="help-block">
                        {{ $errors->first('kode_tabel') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Kode Tabel
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection