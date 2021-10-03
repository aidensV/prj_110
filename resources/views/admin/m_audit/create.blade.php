@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Elemen LED
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_audit.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'prodi_id') ? 'has-error' : '' }}">
                <label for="prodi_id">Prodi Id</label>
                <input type="text" id="prodi_id" name="prodi_id" class="form-control" value="{{ old('prodi_id', isset($m_elemen_led) ? $m_elemen_led->prodi_id : '') }}">
                @if($errors->has('prodi_id'))
                    <p class="help-block">
                        {{ $errors->first('prodi_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'auditor_id') ? 'has-error' : '' }}">
                <label for="auditor_id">Auditor Id</label>
                <input type="text" id="auditor_id" name="auditor_id" class="form-control" value="{{ old('auditor_id', isset($m_elemen_led) ? $m_elemen_led->velemen : '') }}">
                @if($errors->has('auditor_id'))
                    <p class="help-block">
                        {{ $errors->first('auditor_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tgl_mulai') ? 'has-error' : '' }}">
                <label for="tgl_mulai">Tanggal Mulai</label>
                <input type="text" id="tgl_mulai" name="tgl_mulai" class="form-control" value="{{ old('tgl_mulai', isset($m_elemen_led) ? $m_elemen_led->tgl_mulai : '') }}">
                @if($errors->has('tgl_mulai'))
                    <p class="help-block">
                        {{ $errors->first('tgl_mulai') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tgl_selesai') ? 'has-error' : '' }}">
                <label for="tgl_selesai">Tanggal Selesai</label>
                <input type="text" id="tgl_selesai" name="tgl_selesai" class="form-control" value="{{ old('tgl_selesai', isset($m_elemen_led) ? $m_elemen_led->tgl_selesai : '') }}">
                @if($errors->has('tgl_selesai'))
                    <p class="help-block">
                        {{ $errors->first('tgl_selesai') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection