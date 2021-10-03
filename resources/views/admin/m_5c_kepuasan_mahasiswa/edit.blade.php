@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Kepuasan Mahasiswa
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_5c_kepuasan_mahasiswa.update", [$m_5c_kepuasan_mahasiswa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'aspek_yang_diukur') ? 'has-error' : '' }}">
                <label for="aspek_yang_diukur">Aspek Yang Diukur</label>
                <input type="text" id="aspek_yang_diukur" name="aspek_yang_diukur" class="form-control" value="{{ old('aspek_yang_diukur', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->aspek_yang_diukur : '') }}">
                @if($errors->has('aspek_yang_diukur'))
                    <p class="help-block">
                        {{ $errors->first('aspek_yang_diukur') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Aspek Yang Diukur 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_kepuasan_mahasiswa_sangat_baik') ? 'has-error' : '' }}">
                <label for="tingkat_kepuasan_mahasiswa_sangat_baik">Tingkat Kepuasan Mahasiswa Sangat Baik</label>
                <input type="text" id="tingkat_kepuasan_mahasiswa_sangat_baik" name="tingkat_kepuasan_mahasiswa_sangat_baik" class="form-control" value="{{ old('tingkat_kepuasan_mahasiswa_sangat_baik', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_sangat_baik : '') }}">
                @if($errors->has('tingkat_kepuasan_mahasiswa_sangat_baik'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kepuasan_mahasiswa_sangat_baik') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Kepuasan Mahasiswa Sangat Baik
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_kepuasan_mahasiswa_baik') ? 'has-error' : '' }}">
                <label for="tingkat_kepuasan_mahasiswa_baik">Tingkat Kepuasan Mahasiswa Baik</label>
                <input type="text" id="tingkat_kepuasan_mahasiswa_baik" name="tingkat_kepuasan_mahasiswa_baik" class="form-control" value="{{ old('tingkat_kepuasan_mahasiswa_baik', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_baik : '') }}">
                @if($errors->has('tingkat_kepuasan_mahasiswa_baik'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kepuasan_mahasiswa_baik') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Kepuasan Mahasiswa Baik
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_kepuasan_mahasiswa_cukup') ? 'has-error' : '' }}">
                <label for="tingkat_kepuasan_mahasiswa_cukup">Tingkat Kepuasan Mahasiswa Cukup</label>
                <input type="text" id="tingkat_kepuasan_mahasiswa_cukup" name="tingkat_kepuasan_mahasiswa_cukup" class="form-control" value="{{ old('tingkat_kepuasan_mahasiswa_cukup', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_cukup : '') }}">
                @if($errors->has('tingkat_kepuasan_mahasiswa_cukup'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kepuasan_mahasiswa_cukup') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Kepuasan Mahasiswa Cukup
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tingkat_kepuasan_mahasiswa_kurang') ? 'has-error' : '' }}">
                <label for="tingkat_kepuasan_mahasiswa_kurang">Tingkat Kepuasan Mahasiswa Kurang</label>
                <input type="text" id="tingkat_kepuasan_mahasiswa_kurang" name="tingkat_kepuasan_mahasiswa_kurang" class="form-control" value="{{ old('tingkat_kepuasan_mahasiswa_kurang', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->tingkat_kepuasan_mahasiswa_kurang : '') }}">
                @if($errors->has('tingkat_kepuasan_mahasiswa_kurang'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_kepuasan_mahasiswa_kurang') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tingkat Kepuasan Mahasiswa Kurang
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'rencana_tidak_lanjut_oleh_upps') ? 'has-error' : '' }}">
                <label for="rencana_tidak_lanjut_oleh_upps">Rencana Tidak Lanjut Oleh UPPS</label>
                <input type="text" id="rencana_tidak_lanjut_oleh_upps" name="rencana_tidak_lanjut_oleh_upps" class="form-control" value="{{ old('rencana_tidak_lanjut_oleh_upps', isset($m_5c_kepuasan_mahasiswa) ? $m_5c_kepuasan_mahasiswa->rencana_tidak_lanjut_oleh_upps : '') }}">
                @if($errors->has('rencana_tidak_lanjut_oleh_upps'))
                    <p class="help-block">
                        {{ $errors->first('rencana_tidak_lanjut_oleh_upps') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Rencana Tidak Lanjut Oleh UPPS
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