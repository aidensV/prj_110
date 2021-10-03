@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Penggunaan Data
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_4_penggunaan_data.update", [$m_4_penggunaan_data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'jenis_penggunaan') ? 'has-error' : '' }}">
                <label for="jenis_penggunaan">Jenis Penggunaan</label>
                <input type="text" id="jenis_penggunaan" name="jenis_penggunaan" class="form-control" value="{{ old('jenis_penggunaan', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->jenis_penggunaan : '') }}">
                @if($errors->has('jenis_penggunaan'))
                    <p class="help-block">
                        {{ $errors->first('jenis_penggunaan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Jenis Penggunaan 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'upps_ts2') ? 'has-error' : '' }}">
                <label for="upps_ts2">UPPS TS2</label>
                <input type="text" id="upps_ts2" name="upps_ts2" class="form-control" value="{{ old('upps_ts2', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->upps_ts2 : '') }}">
                @if($errors->has('upps_ts2'))
                    <p class="help-block">
                        {{ $errors->first('upps_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan UPPS TS2
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'upps_ts1') ? 'has-error' : '' }}">
                <label for="upps_ts1">UPPS TS1</label>
                <input type="text" id="upps_ts1" name="upps_ts1" class="form-control" value="{{ old('upps_ts1', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->upps_ts1 : '') }}">
                @if($errors->has('upps_ts1'))
                    <p class="help-block">
                        {{ $errors->first('upps_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan UPPS TS1
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'upps_ts') ? 'has-error' : '' }}">
                <label for="upps_ts">UPPS TS</label>
                <input type="text" id="upps_ts" name="upps_ts" class="form-control" value="{{ old('upps_ts', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->upps_ts : '') }}">
                @if($errors->has('upps_ts'))
                    <p class="help-block">
                        {{ $errors->first('upps_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan UPPS TS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'program_studi_ts2') ? 'has-error' : '' }}">
                <label for="program_studi_ts2">Program Studi TS2</label>
                <input type="text" id="program_studi_ts2" name="program_studi_ts2" class="form-control" value="{{ old('program_studi_ts2', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->program_studi_ts2 : '') }}">
                @if($errors->has('program_studi_ts2'))
                    <p class="help-block">
                        {{ $errors->first('program_studi_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Program Studi TS2
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'program_studi_ts1') ? 'has-error' : '' }}">
                <label for="program_studi_ts1">Program Studi TS1</label>
                <input type="text" id="program_studi_ts1" name="program_studi_ts1" class="form-control" value="{{ old('program_studi_ts1', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->program_studi_ts1 : '') }}">
                @if($errors->has('program_studi_ts1'))
                    <p class="help-block">
                        {{ $errors->first('program_studi_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Program Studi TS1
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'program_studi_ts') ? 'has-error' : '' }}">
                <label for="program_studi_ts">Program Studi TS</label>
                <input type="text" id="program_studi_ts" name="program_studi_ts" class="form-control" value="{{ old('program_studi_ts', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->program_studi_ts : '') }}">
                @if($errors->has('program_studi_ts'))
                    <p class="help-block">
                        {{ $errors->first('program_studi_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Program Studi TS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'rata_rata') ? 'has-error' : '' }}">
                <label for="rata_rata">Rata Rata</label>
                <input type="text" id="rata_rata" name="rata_rata" class="form-control" value="{{ old('rata_rata', isset($m_4_penggunaan_data) ? $m_4_penggunaan_data->rata_rata : '') }}">
                @if($errors->has('rata_rata'))
                    <p class="help-block">
                        {{ $errors->first('rata_rata') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Rata Rata
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