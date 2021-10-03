@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        BORANG PENILAIAN
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_borang.update", [$m_borang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'elemen') ? 'has-error' : '' }}">
                <label for="elemen">Elemen</label>
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                    <input type="text" readonly  name="elemen" class="form-control" value="{{ old('elemen', isset($m_borang) ? $m_borang->elemen : '') }}">
                    @else
                    <input type="text" id="elemen" name="elemen" class="form-control" value="{{ old('elemen', isset($m_borang) ? $m_borang->elemen : '') }}">
                @endif
                @if($errors->has('elemen'))
                    <p class="help-block">
                        {{ $errors->first('elemen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'no_stndr') ? 'has-error' : '' }}">
                <label for="no_stndr">No Standar</label>
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <input readonly type="text"  name="no_stndr" class="form-control" value="{{ old('no_stndr', isset($m_borang) ? $m_borang->no_stndr : '') }}">
                @else
                <input type="text" id="no_stndr" name="no_stndr" class="form-control" value="{{ old('no_stndr', isset($m_borang) ? $m_borang->no_stndr : '') }}">
                @endif
                @if($errors->has('no_stndr'))
                    <p class="help-block">
                        {{ $errors->first('no_stndr') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Elemen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'indi_penilai') ? 'has-error' : '' }}">
                <label for="indi_penilai">Indikator Penilaian</label>
                @foreach ($data_detail as $item)
                    
                <input type="text" readonly id="indi_penilai" name="indi_penilai" class="form-control" value="{{ $item }}">
                @endforeach
                
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'skor_PS') ? 'has-error' : '' }}">
                <label for="skor_PS">Skor PS</label>
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <input readonly type="text"  name="skor_PS" class="form-control" value="{{ old('skor_PS', isset($m_borang) ? $m_borang->skor_PS : '') }}">
                @else
                <input type="text" id="skor_PS" name="skor_PS" class="form-control" value="{{ old('skor_PS', isset($m_borang) ? $m_borang->skor_PS : '') }}">
                @endif
                @if($errors->has('skor_PS'))
                    <p class="help-block">
                        {{ $errors->first('skor_PS') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'skor_auditor') ? 'has-error' : '' }}">
                <label for="skor_auditor">Skor_Auditor</label>
                <input type="text" id="skor_auditor" name="skor_auditor" class="form-control" value="{{ old('skor_auditor', isset($m_borang) ? $m_borang->skor_auditor : '') }}">
                @if($errors->has('skor_auditor'))
                    <p class="help-block">
                        {{ $errors->first('skor_auditor') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'ket') ? 'has-error' : '' }}">
                <label for="ket">Keterangan</label>
                <input type="text" id="ket" name="ket" class="form-control" value="{{ old('ket', isset($m_borang) ? $m_borang->ket : '') }}">
                @if($errors->has('ket'))
                    <p class="help-block">
                        {{ $errors->first('ket') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'stnd_unila') ? 'has-error' : '' }}">
                <label for="stnd_unila">Standar Unila</label>
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <input type="text" readonly name="stnd_unila" class="form-control" value="{{ old('stnd_unila', isset($m_borang) ? $m_borang->stnd_unila : '') }}">
                @else
                <input type="text" id="stnd_unila" name="stnd_unila" class="form-control" value="{{ old('stnd_unila', isset($m_borang) ? $m_borang->stnd_unila : '') }}">
                @endif
                @if($errors->has('stnd_unila'))
                    <p class="help-block">
                        {{ $errors->first('stnd_unila') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot') ? 'has-error' : '' }}">
                <label for="bobot">Bobot</label>
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <input type="text" readonly name="bobot" class="form-control" value="{{ old('bobot', isset($m_borang) ? $m_borang->bobot : '') }}">
                @else
                <input type="text" id="bobot" name="bobot" class="form-control" value="{{ old('bobot', isset($m_borang) ? $m_borang->bobot : '') }}">
                @endif
                @if($errors->has('bobot'))
                    <p class="help-block">
                        {{ $errors->first('bobot') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'persen') ? 'has-error' : '' }}">
                <label for="persen">Persen</label>
                <input type="text" id="persen" name="persen" class="form-control" value="{{ old('persen', isset($m_borang) ? $m_borang->persen : '') }}">
                @if($errors->has('persen'))
                    <p class="help-block">
                        {{ $errors->first('persen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'kinerja') ? 'has-error' : '' }}">
                <label for="kinerja">Kinerja</label>
                <input type="text" id="kinerja" name="kinerja" class="form-control" value="{{ old('kinerja', isset($m_borang) ? $m_borang->kinerja : '') }}">
                @if($errors->has('kinerja'))
                    <p class="help-block">
                        {{ $errors->first('kinerja') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'catatan') ? 'has-error' : '' }}">
                <label for="catatan">Catatan</label>
                <input type="text" id="catatan" name="catatan" class="form-control" value="{{ old('catatan', isset($m_borang) ? $m_borang->catatan : '') }}">
                @if($errors->has('catatan'))
                    <p class="help-block">
                        {{ $errors->first('catatan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
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
