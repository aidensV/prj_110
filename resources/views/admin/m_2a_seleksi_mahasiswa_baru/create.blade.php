@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Seleksi Mahasiswa Baru
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_2a_seleksi_mahasiswa_baru.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('tahun_akademik') ? 'has-error' : '' }}">
                <label for="tahun_akademik">Tahun Akademik</label>
                <input type="text" id="tahun_akademik" name="tahun_akademik" class="form-control" value="{{ old('tahun_akademik', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->tahun_akademik : '') }}">
                @if($errors->has('tahun_akademik'))
                    <p class="help-block">
                        {{ $errors->first('tahun_akademik') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('daya_tampung') ? 'has-error' : '' }}">
                <label for="daya_tampung">Daya Tampung</label>
                <input type="text" id="daya_tampung" name="daya_tampung" class="form-control" value="{{ old('daya_tampung', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->daya_tampung : '') }}">
                @if($errors->has('daya_tampung'))
                    <p class="help-block">
                        {{ $errors->first('daya_tampung') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_calon_mhs_pendftr') ? 'has-error' : '' }}">
                <label for="jmlh_calon_mhs_pendftr">Jumlah Calon Mahasiswa Pendaftar</label>
                <input type="text" id="jmlh_calon_mhs_pendftr" name="jmlh_calon_mhs_pendftr" class="form-control" value="{{ old('jmlh_calon_mhs_pendftr', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_calon_mhs_pendftr : '') }}">
                @if($errors->has('jmlh_calon_mhs_pendftr'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_calon_mhs_pendftr') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_calon_mhs_lulus_seleksi') ? 'has-error' : '' }}">
                <label for="jmlh_calon_mhs_lulus_seleksi">Jumlah Calon Mahasiswa Lulus Seleksi</label>
                <input type="text" id="jmlh_calon_mhs_lulus_seleksi" name="jmlh_calon_mhs_lulus_seleksi" class="form-control" value="{{ old('jmlh_calon_mhs_lulus_seleksi', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_calon_mhs_lulus_seleksi : '') }}">
                @if($errors->has('jmlh_calon_mhs_lulus_seleksi'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_calon_mhs_lulus_seleksi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_mhs_baru_reg') ? 'has-error' : '' }}">
                <label for="jmlh_mhs_baru_reg">Jumlah Mahasiswa Baru Reguler</label>
                <input type="text" id="jmlh_mhs_baru_reg" name="jmlh_mhs_baru_reg" class="form-control" value="{{ old('jmlh_mhs_baru_reg', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_baru_reg : '') }}">
                @if($errors->has('jmlh_mhs_baru_reg'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_mhs_baru_reg') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_mhs_baru_trf') ? 'has-error' : '' }}">
                <label for="jmlh_mhs_baru_trf">Jumlah Mahasiswa Baru Transfer</label>
                <input type="text" id="jmlh_mhs_baru_trf" name="jmlh_mhs_baru_trf" class="form-control" value="{{ old('jmlh_mhs_baru_trf', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_baru_trf : '') }}">
                @if($errors->has('jmlh_mhs_baru_trf'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_mhs_baru_trf') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan manfaat bagi PS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_mhs_aktif_reg') ? 'has-error' : '' }}">
                <label for="jmlh_mhs_aktif_reg">Jumlah Mahasiswa Aktif Reguler</label>
                <input type="text" id="jmlh_mhs_aktif_reg" name="jmlh_mhs_aktif_reg" class="form-control" value="{{ old('jmlh_mhs_aktif_reg', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_aktif_reg : '') }}">
                @if($errors->has('jmlh_mhs_aktif_reg'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_mhs_aktif_reg') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan waktu dan durasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jmlh_mhs_aktif_trf') ? 'has-error' : '' }}">
                <label for="jmlh_mhs_aktif_trf">Jumlah Mahasiswa Aktif Transfer</label>
                <input type="text" id="jmlh_mhs_aktif_trf" name="jmlh_mhs_aktif_trf" class="form-control" value="{{ old('jmlh_mhs_aktif_trf', isset($m_2a_seleksi_mahasiswa_baru) ? $m_2a_seleksi_mahasiswa_baru->jmlh_mhs_aktif_trf : '') }}">
                @if($errors->has('jmlh_mhs_aktif_trf'))
                    <p class="help-block">
                        {{ $errors->first('jmlh_mhs_aktif_trf') }}
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