@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penelitian DTPS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_3b2_penelitian_dtps.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'sumber_pembiayaan') ? 'has-error' : '' }}">
                <label for="sumber_pembiayaan">Sumber Pembiayaan </label>
                <input type="text" id="sumber_pembiayaan" name="sumber_pembiayaan" class="form-control" value="{{ old('sumber_pembiayaan', isset($m_3b2_penelitian_dtps) ? $m_3b2_penelitian_dtps->sumber_pembiayaan : '') }}">
                @if($errors->has('sumber_pembiayaan'))
                    <p class="help-block">
                        {{ $errors->first('sumber_pembiayaan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Sumber Pembiayaan 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah_judul_penelitian_ts2') ? 'has-error' : '' }}">
                <label for="jumlah_judul_penelitian_ts2">Jumlah Judul Penelitian TS2</label>
                <input type="text" id="jumlah_judul_penelitian_ts2" name="jumlah_judul_penelitian_ts2" class="form-control" value="{{ old('jumlah_judul_penelitian_ts2', isset($m_3b2_penelitian_dtps) ? $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts2 : '') }}">
                @if($errors->has('jumlah_judul_penelitian_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_judul_penelitian_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul Penelitian TS2
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah_judul_penelitian_ts1') ? 'has-error' : '' }}">
                <label for="jumlah_judul_penelitian_ts1">Jumlah Judul Penelitian TS1</label>
                <input type="text" id="rekognisi_dan_bukti Pendukung" name="jumlah_judul_penelitian_ts1" class="form-control" value="{{ old('jumlah_judul_penelitian_ts1', isset($m_3b2_penelitian_dtps) ? $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts1 : '') }}">
                @if($errors->has('jumlah_judul_penelitian_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_judul_penelitian_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul Penelitian TS1
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah_judul_penelitian_ts') ? 'has-error' : '' }}">
                <label for="jumlah_judul_penelitian_ts">Jumlah Judul Penelitian TS</label>
                <input type="text" id="jumlah_judul_penelitian_ts" name="jumlah_judul_penelitian_ts" class="form-control" value="{{ old('jumlah_judul_penelitian_ts', isset($m_3b2_penelitian_dtps) ? $m_3b2_penelitian_dtps->jumlah_judul_penelitian_ts : '') }}">
                @if($errors->has('jumlah_judul_penelitian_ts'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_judul_penelitian_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Judul Penelitian TS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah') ? 'has-error' : '' }}">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', isset($m_3b2_penelitian_dtps) ? $m_3b2_penelitian_dtps->jumlah : '') }}">
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