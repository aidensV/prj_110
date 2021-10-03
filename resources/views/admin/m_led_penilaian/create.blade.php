@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LED Penilaian
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_led_penilaian.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'elemen_led_id') ? 'has-error' : '' }}">
                <label for="elemen_led_id">Elemen LED Id</label>
                <input type="text" id="elemen_led_id" name="elemen_led_id" class="form-control" value="{{ old('elemen_led_id', isset($m_led_penilaian) ? $m_led_penilaian->elemen_led_id : '') }}">
                @if($errors->has('elemen_led_id'))
                    <p class="help-block">
                        {{ $errors->first('elemen_led_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen LED Id 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'skor') ? 'has-error' : '' }}">
                <label for="skor">Skor</label>
                <input type="text" id="skor" name="skor" class="form-control" value="{{ old('skor', isset($m_led_penilaian) ? $m_led_penilaian->skor : '') }}">
                @if($errors->has('skor'))
                    <p class="help-block">
                        {{ $errors->first('skor') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Skor
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bukti_kinerja') ? 'has-error' : '' }}">
                <label for="bukti_kinerja">Bukti Kinerja</label>
                <input type="text" id="bukti_kinerja" name="bukti_kinerja" class="form-control" value="{{ old('bukti_kinerja', isset($m_led_penilaian) ? $m_led_penilaian->bukti_kinerja : '') }}">
                @if($errors->has('bukti_kinerja'))
                    <p class="help-block">
                        {{ $errors->first('bukti_kinerja') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    ID Penilaian Akreditasi
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection