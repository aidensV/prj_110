@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        PKM DTPS
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3b3_pkm_dtps.update", [$m_3b3_pkm_dtps->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'sumber_pembiayaan') ? 'has-error' : '' }}">
                <label for="sumber_pembiayaan">Sumber Pembiayaan </label>
                <input type="text" id="sumber_pembiayaan" name="sumber_pembiayaan" class="form-control" value="{{ old('sumber_pembiayaan', isset($m_3b3_pkm_dtps) ? $m_3b3_pkm_dtps->sumber_pembiayaan : '') }}">
                @if($errors->has('sumber_pembiayaan'))
                    <p class="help-block">
                        {{ $errors->first('sumber_pembiayaan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Sumber Pembiayaan 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_pkm_ts2') ? 'has-error' : '' }}">
                <label for="jmlh_judul_pkm_ts2">Jumlah Judul PKM TS2</label>
                <input type="text" id="jmlh_judul_pkm_ts2" name="jmlh_judul_pkm_ts2" class="form-control" value="{{ old('jmlh_judul_pkm_ts2', isset($m_3b3_pkm_dtps) ? $m_3b3_pkm_dtps->jmlh_judul_pkm_ts2 : '') }}">
                @if($errors->has('jmlh_judul_pkm_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_pkm_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul PKM TS2
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_pkm_ts1') ? 'has-error' : '' }}">
                <label for="jmlh_judul_pkm_ts1">Jumlah Judul PKM TS1</label>
                <input type="text" id="jmlh_judul_pkm_ts1" name="jmlh_judul_pkm_ts1" class="form-control" value="{{ old('jmlh_judul_pkm_ts1', isset($m_3b3_pkm_dtps) ? $m_3b3_pkm_dtps->jmlh_judul_pkm_ts1 : '') }}">
                @if($errors->has('jmlh_judul_pkm_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_pkm_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul PKM TS1
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_pkm_ts') ? 'has-error' : '' }}">
                <label for="jmlh_judul_pkm_ts">Jumlah Judul PKM TS</label>
                <input type="text" id="jmlh_judul_pkm_ts" name="jmlh_judul_pkm_ts" class="form-control" value="{{ old('jmlh_judul_pkm_ts', isset($m_3b3_pkm_dtps) ? $m_3b3_pkm_dtps->jmlh_judul_pkm_ts : '') }}">
                @if($errors->has('jmlh_judul_pkm_ts'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_pkm_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul PKM TS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah') ? 'has-error' : '' }}">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', isset($m_3b3_pkm_dtps) ? $m_3b3_pkm_dtps->jumlah : '') }}">
                @if($errors->has('jumlah'))
                    <p class="help-block">
                        {{ $errors->first('jumlah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection