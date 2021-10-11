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
                @can('borang_nilai')
                    
                <input type="text" id="elemen" name="elemen" class="form-control" value="{{ old('elemen', isset($m_borang) ? $m_borang->elemen : '') }}">
                    @endcan
                    @cannot('borang_nilai')
                    <input type="text" readonly  name="elemen" class="form-control" value="{{ old('elemen', isset($m_borang) ? $m_borang->elemen : '') }}">    
                    @endcannot
                
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
                @can('borang_nilai')
                
                <input type="text" id="no_stndr" name="no_stndr" class="form-control" value="{{ old('no_stndr', isset($m_borang) ? $m_borang->no_stndr : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input readonly type="text"  name="no_stndr" class="form-control" value="{{ old('no_stndr', isset($m_borang) ? $m_borang->no_stndr : '') }}">
                    
                @endcannot
                
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
                @foreach ($m_borang->indikator as $item)
                    
                <input type="text" readonly id="indi_penilai" name="indi_penilai" class="form-control" value="{{ $item->value_indicator }}">
                @endforeach
                
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'skor_PS') ? 'has-error' : '' }}">
                <label for="skor_PS">Skor PS</label>
                @can('borang_nilai')
                <input type="text" id="skor_PS" name="skor_PS" class="form-control" value="{{ old('skor_PS', isset($m_borang) ? $m_borang->skor_PS : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input readonly type="text"  name="skor_PS" class="form-control" value="{{ old('skor_PS', isset($m_borang) ? $m_borang->skor_PS : '') }}">
                
                @endcannot
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
                @can('borang_nilai')
                <input type="text" id="ket" name="ket" class="form-control" value="{{ old('ket', isset($m_borang) ? $m_borang->ket : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input type="text" id="ket" readonly name="ket" class="form-control" value="{{ old('ket', isset($m_borang) ? $m_borang->ket : '') }}">
                @endcannot
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
                @can('borang_nilai')
                <input type="text" id="stnd_unila" name="stnd_unila" class="form-control" value="{{ old('stnd_unila', isset($m_borang) ? $m_borang->stnd_unila : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input type="text" readonly name="stnd_unila" class="form-control" value="{{ old('stnd_unila', isset($m_borang) ? $m_borang->stnd_unila : '') }}">
                @endcannot
                @if($errors->has('stnd_unila'))
                    <p class="help-block">
                        {{ $errors->first('stnd_unila') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_sumber') ? 'has-error' : '' }}">
                <label for="bobot_sumber">Bobot Sumber</label>
                @can('borang_nilai')
                <input type="text" id="bobot_sumber" name="bobot_sumber" class="form-control" value="{{ old('bobot_sumber', isset($m_borang) ? $m_borang->bobot_sumber : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input type="text" readonly name="bobot_sumber" class="form-control" value="{{ old('bobot_sumber', isset($m_borang) ? $m_borang->bobot_sumber : '') }}">
                @endcannot
                @if($errors->has('bobot_sumber'))
                    <p class="help-block">
                        {{ $errors->first('bobot_sumber') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_ami') ? 'has-error' : '' }}">
                <label for="bobot_ami">Bobot Ami</label>
                @can('borang_nilai')
                <input type="text" id="bobot_ami" name="bobot_ami" class="form-control" value="{{ old('bobot_ami', isset($m_borang) ? $m_borang->bobot_ami : '') }}">
                @endcan
                @cannot('borang_nilai')
                
                <input type="text" readonly id="bobot_ami" name="bobot_ami" class="form-control" value="{{ old('bobot_ami', isset($m_borang) ? $m_borang->bobot_ami : '') }}">
                @endcannot
                @if($errors->has('bobot_ami'))
                    <p class="help-block">
                        {{ $errors->first('bobot_ami') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'capaian') ? 'has-error' : '' }}">
                <label for="capaian">Capaian</label>
                @can('borang_nilai')
                <input type="text" id="capaian" name="capaian" class="form-control" value="{{ old('capaian', isset($m_borang) ? $m_borang->capaian : '') }}">
                @endcan
                @cannot('borang_nilai')
                <input readonly type="text" id="capaian" name="capaian" class="form-control" value="{{ old('capaian', isset($m_borang) ? $m_borang->capaian : '') }}">
                @endcannot
                @if($errors->has('capaian'))
                    <p class="help-block">
                        {{ $errors->first('capaian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Penilaian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'kinerja') ? 'has-error' : '' }}">
                <label for="kinerja">Persen Kinerja</label>
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
