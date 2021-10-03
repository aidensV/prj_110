@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Mahasiswa Asing
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_2b_mahasiswa_asing.update", [$m_2b_mahasiswa_asing->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('program_studi') ? 'has-error' : '' }}">
                <label for="program_studi">Program Studi</label>
                <input type="text" id="program_studi" name="program_studi" class="form-control" value="{{ old('program_studi', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->program_studi : '') }}">
                @if($errors->has('program_studi'))
                    <p class="help-block">
                        {{ $errors->first('program_studi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_aktif_ts2') ? 'has-error' : '' }}">
                <label for="jml_mhs_aktif_ts2">Jumlah Mahasiswa Aktif TS2</label>
                <input type="text" id="jml_mhs_aktif_ts2" name="jml_mhs_aktif_ts2" class="form-control" value="{{ old('jml_mhs_aktif_ts2', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_aktif_ts2 : '') }}">
                @if($errors->has('jml_mhs_aktif_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_aktif_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_aktif_ts1') ? 'has-error' : '' }}">
                <label for="jml_mhs_aktif_ts1">Jumlah Mahasiswa Aktif TS1</label>
                <input type="text" id="jml_mhs_aktif_ts1" name="jml_mhs_aktif_ts1" class="form-control" value="{{ old('jml_mhs_aktif_ts1', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_aktif_ts1 : '') }}">
                @if($errors->has('jml_mhs_aktif_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_aktif_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_aktif_ts') ? 'has-error' : '' }}">
                <label for="jml_mhs_aktif_ts">Jumlah Mahasiswa Aktif TS</label>
                <input type="text" id="jml_mhs_aktif_ts" name="jml_mhs_aktif_ts" class="form-control" value="{{ old('jml_mhs_aktif_ts', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_aktif_ts : '') }}">
                @if($errors->has('jml_mhs_aktif_ts'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_aktif_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_fulltime_ts2') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_fulltime_ts2">Jumlah Mahasiswa Asing Fulltime TS2</label>
                <input type="text" id="jml_mhs_asing_fulltime_ts2" name="jml_mhs_asing_fulltime_ts2" class="form-control" value="{{ old('jml_mhs_asing_fulltime_ts2', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts2 : '') }}">
                @if($errors->has('jml_mhs_asing_fulltime_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_fulltime_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_fulltime_ts1') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_fulltime_ts1">Jumlah Mahasiswa Asing Fulltime TS1</label>
                <input type="text" id="jml_mhs_asing_fulltime_ts1" name="jml_mhs_asing_fulltime_ts1" class="form-control" value="{{ old('jml_mhs_asing_fulltime_ts1', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts1 : '') }}">
                @if($errors->has('jml_mhs_asing_fulltime_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_fulltime_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan manfaat bagi PS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_fulltime_ts') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_fulltime_ts">Jumlah Mahasiswa Asing Fulltime TS</label>
                <input type="text" id="jml_mhs_asing_fulltime_ts" name="jml_mhs_asing_fulltime_ts" class="form-control" value="{{ old('jml_mhs_asing_fulltime_ts', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_fulltime_ts : '') }}">
                @if($errors->has('jml_mhs_asing_fulltime_ts'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_fulltime_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan waktu dan durasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_parttime_ts2') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_parttime_ts2">Jumlah Mahasiswa Asing Parttime TS2</label>
                <input type="text" id="jml_mhs_asing_parttime_ts2" name="jml_mhs_asing_parttime_ts2" class="form-control" value="{{ old('jml_mhs_asing_parttime_ts2', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts2 : '') }}">
                @if($errors->has('jml_mhs_asing_parttime_ts2'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_parttime_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_parttime_ts1') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_parttime_ts1">Jumlah Mahasiswa Asing Parttime TS1</label>
                <input type="text" id="jml_mhs_asing_parttime_ts1" name="jml_mhs_asing_parttime_ts1" class="form-control" value="{{ old('jml_mhs_asing_parttime_ts1', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts1 : '') }}">
                @if($errors->has('jml_mhs_asing_parttime_ts1'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_parttime_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jml_mhs_asing_parttime_ts') ? 'has-error' : '' }}">
                <label for="jml_mhs_asing_parttime_ts">Jumlah Mahasiswa Asing Parttime TS</label>
                <input type="text" id="jml_mhs_asing_parttime_ts" name="jml_mhs_asing_parttime_ts" class="form-control" value="{{ old('jml_mhs_asing_parttime_ts', isset($m_2b_mahasiswa_asing) ? $m_2b_mahasiswa_asing->jml_mhs_asing_parttime_ts : '') }}">
                @if($errors->has('jml_mhs_asing_parttime_ts'))
                    <p class="help-block">
                        {{ $errors->first('jml_mhs_asing_parttime_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection