@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        INDIKATOR KINERJA UTAMA
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_borang.update", [$m_borang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'indikator') ? 'has-error' : '' }}">
                <label for="indikator">Indikator</label>
                <input type="text" id="indikator" name="indikator" class="form-control" value="{{ old('indikator', isset($m_iku) ? $m_iku->indikator : '') }}">
                @if($errors->has('indikator'))
                    <p class="help-block">
                        {{ $errors->first('indikator') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh') ? 'has-error' : '' }}">
                <label for="jmlh">Jumlah/Presentase</label>
                <input type="text" id="jmlh" name="jmlh" class="form-control" value="{{ old('jmlh', isset($m_iku) ? $m_iku->jmlh : '') }}">
                @if($errors->has('jmlh'))
                    <p class="help-block">
                        {{ $errors->first('jmlh') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen
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
