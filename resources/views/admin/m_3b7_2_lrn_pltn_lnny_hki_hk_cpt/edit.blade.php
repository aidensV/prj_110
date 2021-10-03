@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Luaran Penelitian Lainnya HKI Hak Cipta
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3b7_2_lrn_pltn_lnny_hki_hk_cpt.update", [$m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'luaran_penelitian_dan_pkm') ? 'has-error' : '' }}">
                <label for="luaran_penelitian_dan_pkm">Luaran Penelitian dan PKM</label>
                <input type="text" id="luaran_penelitian_dan_pkm" name="luaran_penelitian_dan_pkm" class="form-control" value="{{ old('luaran_penelitian_dan_pkm', isset($m_3b7_2_lrn_pltn_lnny_hki_hk_cpt) ? $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->luaran_penelitian_dan_pkm : '') }}">
                @if($errors->has('luaran_penelitian_dan_pkm'))
                    <p class="help-block">
                        {{ $errors->first('luaran_penelitian_dan_pkm') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Luaran Penelitian dan PKM 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_3b7_2_lrn_pltn_lnny_hki_hk_cpt) ? $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tahun
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'keterangan') ? 'has-error' : '' }}">
                <label for="keterangan">Keterangan</label>
                <input type="text" id="keterangan" name="keterangan" class="form-control" value="{{ old('keterangan', isset($m_3b7_2_lrn_pltn_lnny_hki_hk_cpt) ? $m_3b7_2_lrn_pltn_lnny_hki_hk_cpt->keterangan : '') }}">
                @if($errors->has('keterangan'))
                    <p class="help-block">
                        {{ $errors->first('keterangan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Keterangan
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