@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Pagelaran Ilmiah DTPS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_3b4_2_pagelaran_ilmiah_dtps.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'jenis_publikasi') ? 'has-error' : '' }}">
                <label for="jenis_publikasi">Jenis Publikasi </label>
                <input type="text" id="jenis_publikasi" name="jenis_publikasi" class="form-control" value="{{ old('jenis_publikasi', isset($m_3b4_2_pagelaran_ilmiah_dtps) ? $m_3b4_2_pagelaran_ilmiah_dtps->jenis_publikasi : '') }}">
                @if($errors->has('jenis_publikasi'))
                    <p class="help-block">
                        {{ $errors->first('jenis_publikasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jenis Publikasi 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_ts2') ? 'has-error' : '' }}">
                <label for="jmlh_judul_ts2">Jumlah Judul TS2</label>
                <input type="text" id="jmlh_judul_ts2" name="jmlh_judul_ts2" class="form-control" value="{{ old('jmlh_judul_ts2', isset($m_3b4_2_pagelaran_ilmiah_dtps) ? $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts2 : '') }}">
                @if($errors->has('jmlh_judul_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul TS2
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_ts1') ? 'has-error' : '' }}">
                <label for="jmlh_judul_ts1">Jumlah Judul TS1</label>
                <input type="text" id="jmlh_judul_ts1" name="jmlh_judul_ts1" class="form-control" value="{{ old('jmlh_judul_ts1', isset($m_3b4_2_pagelaran_ilmiah_dtps) ? $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts1 : '') }}">
                @if($errors->has('jmlh_judul_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul TS1
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jmlh_judul_ts') ? 'has-error' : '' }}">
                <label for="jmlh_judul_ts">Jumlah Judul TS</label>
                <input type="text" id="jmlh_judul_ts" name="jmlh_judul_ts" class="form-control" value="{{ old('jmlh_judul_ts', isset($m_3b4_2_pagelaran_ilmiah_dtps) ? $m_3b4_2_pagelaran_ilmiah_dtps->jmlh_judul_ts : '') }}">
                @if($errors->has('jmlh_judul_ts'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_judul_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul TS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah') ? 'has-error' : '' }}">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', isset($m_3b4_2_pagelaran_ilmiah_dtps) ? $m_3b4_2_pagelaran_ilmiah_dtps->jumlah : '') }}">
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