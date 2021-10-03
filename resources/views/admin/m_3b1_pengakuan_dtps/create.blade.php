@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Pengakuan DTPS
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_3b1_pengakuan_dtps.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen </label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bidang_keahlian') ? 'has-error' : '' }}">
                <label for="bidang_keahlian">Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->bidang_keahlian : '') }}">
                @if($errors->has('bidang_keahlian'))
                    <p class="help-block">
                        {{ $errors->first('bidang_keahlian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bidang Keahlian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'rekognisi_dan_bukti_pendukung') ? 'has-error' : '' }}">
                <label for="rekognisi_dan_bukti_pendukung">Rekognisi Dan Bukti Pendukung</label>
                <input type="text" id="rekognisi_dan_bukti Pendukung" name="rekognisi_dan_bukti_pendukung" class="form-control" value="{{ old('rekognisi_dan_bukti_pendukung', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->rekognisi_dan_bukti_pendukung : '') }}">
                @if($errors->has('rekognisi_dan_bukti_pendukung'))
                    <p class="help-block">
                        {{ $errors->first('rekognisi_dan_bukti_pendukung') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Rekognisi Dan Bukti Pendukung
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_internasional') ? 'has-error' : '' }}">
                <label for="tingkat_internasional">Tingkat Internasional</label>
                <input type="text" id="tingkat_internasional" name="tingkat_internasional" class="form-control" value="{{ old('tingkat_internasional', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->tingkat_internasional : '') }}">
                @if($errors->has('tingkat_internasional'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_internasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_nasional') ? 'has-error' : '' }}">
                <label for="tingkat_nasional">Tingkat Nasional</label>
                <input type="text" id="tingkat_nasional" name="tingkat_nasional" class="form-control" value="{{ old('tingkat_nasional', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->tingkat_nasional : '') }}">
                @if($errors->has('tingkat_nasional'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_nasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_wilayah') ? 'has-error' : '' }}">
                <label for="tingkat_wilayah">Tingkat Wilayah</label>
                <input type="text" id="tingkat_wilayah" name="tingkat_wilayah" class="form-control" value="{{ old('tingkat_wilayah', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->tingkat_wilayah : '') }}">
                @if($errors->has('tingkat_wilayah'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_wilayah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_3b1_pengakuan_dtps) ? $m_3b1_pengakuan_dtps->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tahun
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection