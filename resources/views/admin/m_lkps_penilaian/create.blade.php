@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LKPS Penilaian
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_lkps_penilaian.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'elemen_lkps_id') ? 'has-error' : '' }}">
                <label for="elemen_lkps_id">Elemen LKPS Id</label>
                <input type="text" id="elemen_lkps_id" name="elemen_lkps_id" class="form-control" value="{{ old('elemen_lkps_id', isset($m_lkps_penilaian) ? $m_lkps_penilaian->elemen_lkps_id : '') }}">
                @if($errors->has('elemen_lkps_id'))
                    <p class="help-block">
                        {{ $errors->first('elemen_lkps_id') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen LKPS Id 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'skor') ? 'has-error' : '' }}">
                <label for="skor">Skor</label>
                <input type="text" id="skor" name="skor" class="form-control" value="{{ old('skor', isset($m_lkps_penilaian) ? $m_lkps_penilaian->skor : '') }}">
                @if($errors->has('skor'))
                    <p class="help-block">
                        {{ $errors->first('skor') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Skor
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection