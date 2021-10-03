@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Pembimbing Utama Tugas Akhir
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_3a_2_dospem_utama_ta.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_diakreditasi_ts2') ? 'has-error' : '' }}">
                <label for="ps_diakreditasi_ts2">Mahasiswa yg di bimbing PS diakreditasi TS2</label>
                <input type="text" id="ps_diakreditasi_ts2" name="ps_diakreditasi_ts2" class="form-control" value="{{ old('ps_diakreditasi_ts2', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts2 : '') }}">
                @if($errors->has('ps_diakreditasi_ts2'))
                    <p class="help-block">
                        {{ $errors->first('ps_diakreditasi_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_diakreditasi_ts1') ? 'has-error' : '' }}">
                <label for="ps_diakreditasi_ts1">Mahasiswa yg di bimbing PS diakreditasi TS1</label>
                <input type="text" id="ps_diakreditasi_ts1" name="ps_diakreditasi_ts1" class="form-control" value="{{ old('ps_diakreditasi_ts1', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts1 : '') }}">
                @if($errors->has('ps_diakreditasi_ts1'))
                    <p class="help-block">
                        {{ $errors->first('ps_diakreditasi_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_diakreditasi_ts') ? 'has-error' : '' }}">
                <label for="ps_diakreditasi_ts">Mahasiswa yg di bimbing PS diakreditasi TS</label>
                <input type="text" id="ps_diakreditasi_ts" name="ps_diakreditasi_ts" class="form-control" value="{{ old('ps_diakreditasi_ts', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_diakreditasi_ts : '') }}">
                @if($errors->has('ps_diakreditasi_ts'))
                    <p class="help-block">
                        {{ $errors->first('ps_diakreditasi_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_lain_ts2') ? 'has-error' : '' }}">
                <label for="ps_lain_ts2">Mahasiswa yg di bimbing PS lain TS2</label>
                <input type="text" id="ps_lain_ts2" name="ps_lain_ts2" class="form-control" value="{{ old('ps_lain_ts2', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_lain_ts2 : '') }}">
                @if($errors->has('ps_lain_ts2'))
                    <p class="help-block">
                        {{ $errors->first('ps_lain_ts2') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_lain_ts1') ? 'has-error' : '' }}">
                <label for="ps_lain_ts1">Mahasiswa yg di bimbing PS lain TS1</label>
                <input type="text" id="ps_lain_ts1" name="ps_lain_ts1" class="form-control" value="{{ old('ps_lain_ts1', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_lain_ts1 : '') }}">
                @if($errors->has('ps_lain_ts1'))
                    <p class="help-block">
                        {{ $errors->first('ps_lain_ts1') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan manfaat bagi PS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ps_lain_ts') ? 'has-error' : '' }}">
                <label for="ps_lain_ts">Mahasiswa yg di bimbing PS lain TS</label>
                <input type="text" id="ps_lain_ts" name="ps_lain_ts" class="form-control" value="{{ old('ps_lain_ts', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->ps_lain_ts : '') }}">
                @if($errors->has('ps_lain_ts'))
                    <p class="help-block">
                        {{ $errors->first('ps_lain_ts') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan waktu dan durasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('rata_jmlh_bimbingan') ? 'has-error' : '' }}">
                <label for="rata_jmlh_bimbingan">Rata-rata Jumlah Bimbingan</label>
                <input type="text" id="rata_jmlh_bimbingan" name="rata_jmlh_bimbingan" class="form-control" value="{{ old('rata_jmlh_bimbingan', isset($m_3a_2_dospem_utama_ta) ? $m_3a_2_dospem_utama_ta->rata_jmlh_bimbingan : '') }}">
                @if($errors->has('rata_jmlh_bimbingan'))
                    <p class="help-block">
                        {{ $errors->first('rata_jmlh_bimbingan') }}
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