@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian/PKM yang Dihasilkan Mahasiswa (TTG)
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8f4_3_luaran_penelitian_ttg.update", [$m_8f4_3_luaran_penelitian_ttg->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('luaran_penelitian_dan_pkm') ? 'has-error' : '' }}">
                <label for="luaran_penelitian_dan_pkm">Luaran Penelitian dan PKM</label>
                <input type="text" id="luaran_penelitian_dan_pkm" name="luaran_penelitian_dan_pkm" class="form-control" value="{{ old('luaran_penelitian_dan_pkm', isset($m_8f4_3_luaran_penelitian_ttg) ? $m_8f4_3_luaran_penelitian_ttg->luaran_penelitian_dan_pkm : '') }}">
                @if($errors->has('luaran_penelitian_dan_pkm'))
                    <p class="help-block">
                        {{ $errors->first('luaran_penelitian_dan_pkm') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_8f4_3_luaran_penelitian_ttg) ? $m_8f4_3_luaran_penelitian_ttg->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan', isset($m_8f4_3_luaran_penelitian_ttg) ? $m_8f4_3_luaran_penelitian_ttg->keterangan : '') }}">
                @if($errors->has('keterangan'))
                    <p class="help-block">
                        {{ $errors->first('keterangan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection