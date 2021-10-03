@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Tetap Perguruan Tinggi
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_3a_1_dosen_tetap_pt.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('nidn_nidk') ? 'has-error' : '' }}">
                <label for="nidn_nidk">NIDN/NIDK</label>
                <input type="text" id="nidn_nidk" name="nidn_nidk" class="form-control" value="{{ old('nidn_nidk', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->nidn_nidk : '') }}">
                @if($errors->has('nidn_nidk'))
                    <p class="help-block">
                        {{ $errors->first('nidn_nidk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('psc_srjn_m_mt_sp') ? 'has-error' : '' }}">
                <label for="psc_srjn_m_mt_sp">Pendidikan Pascasarjana Magister/Magister Terapan/Spesialis</label>
                <input type="text" id="psc_srjn_m_mt_sp" name="psc_srjn_m_mt_sp" class="form-control" value="{{ old('psc_srjn_m_mt_sp', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->psc_srjn_m_mt_sp : '') }}">
                @if($errors->has('psc_srjn_m_mt_sp'))
                    <p class="help-block">
                        {{ $errors->first('psc_srjn_m_mt_sp') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('psc_srjn_d_dt_sp') ? 'has-error' : '' }}">
                <label for="psc_srjn_d_dt_sp">Pendidikan Pascasarjana Doktor/Doktor Terapan/Spesialis</label>
                <input type="text" id="psc_srjn_d_dt_sp" name="psc_srjn_d_dt_sp" class="form-control" value="{{ old('psc_srjn_d_dt_sp', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->psc_srjn_d_dt_sp : '') }}">
                @if($errors->has('psc_srjn_d_dt_sp'))
                    <p class="help-block">
                        {{ $errors->first('psc_srjn_d_dt_sp') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('bidang_keahlian') ? 'has-error' : '' }}">
                <label for="bidang_keahlian">Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->bidang_keahlian : '') }}">
                @if($errors->has('bidang_keahlian'))
                    <p class="help-block">
                        {{ $errors->first('bidang_keahlian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('kssn_komptn_inti_ps') ? 'has-error' : '' }}">
                <label for="kssn_komptn_inti_ps">Kesesuaian dengan Kompetensi Inti PS</label>
                <input type="text" id="kssn_komptn_inti_ps" name="kssn_komptn_inti_ps" class="form-control" value="{{ old('kssn_komptn_inti_ps', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->kssn_komptn_inti_ps : '') }}">
                @if($errors->has('kssn_komptn_inti_ps'))
                    <p class="help-block">
                        {{ $errors->first('kssn_komptn_inti_ps') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan manfaat bagi PS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jabatan_akademik') ? 'has-error' : '' }}">
                <label for="jabatan_akademik">Jabatan Akademik</label>
                <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control" value="{{ old('jabatan_akademik', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->jabatan_akademik : '') }}">
                @if($errors->has('jabatan_akademik'))
                    <p class="help-block">
                        {{ $errors->first('jabatan_akademik') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan waktu dan durasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('serti_pendidik_pro') ? 'has-error' : '' }}">
                <label for="serti_pendidik_pro">Sertifikat Pendidik Profesional</label>
                <input type="text" id="serti_pendidik_pro" name="serti_pendidik_pro" class="form-control" value="{{ old('serti_pendidik_pro', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->serti_pendidik_pro : '') }}">
                @if($errors->has('serti_pendidik_pro'))
                    <p class="help-block">
                        {{ $errors->first('serti_pendidik_pro') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('serti_komptnsi_profesi_indstr') ? 'has-error' : '' }}">
                <label for="serti_komptnsi_profesi_indstr">Sertifikat  Kompetensi/Profesi/Industri</label>
                <input type="text" id="serti_komptnsi_profesi_indstr" name="serti_komptnsi_profesi_indstr" class="form-control" value="{{ old('serti_komptnsi_profesi_indstr', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->serti_komptnsi_profesi_indstr : '') }}">
                @if($errors->has('serti_komptnsi_profesi_indstr'))
                    <p class="help-block">
                        {{ $errors->first('serti_komptnsi_profesi_indstr') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('matkul_ps_akreditasi') ? 'has-error' : '' }}">
                <label for="matkul_ps_akreditasi">Mata Kuliah yang Diampu pada PS yang Diakreditasi</label>
                <input type="text" id="matkul_ps_akreditasi" name="matkul_ps_akreditasi" class="form-control" value="{{ old('matkul_ps_akreditasi', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->matkul_ps_akreditasi : '') }}">
                @if($errors->has('matkul_ps_akreditasi'))
                    <p class="help-block">
                        {{ $errors->first('matkul_ps_akreditasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('kssn_bdg_keahlian_dg_matkul') ? 'has-error' : '' }}">
                <label for="kssn_bdg_keahlian_dg_matkul">Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</label>
                <input type="text" id="kssn_bdg_keahlian_dg_matkul" name="kssn_bdg_keahlian_dg_matkul" class="form-control" value="{{ old('kssn_bdg_keahlian_dg_matkul', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->kssn_bdg_keahlian_dg_matkul : '') }}">
                @if($errors->has('kssn_bdg_keahlian_dg_matkul'))
                    <p class="help-block">
                        {{ $errors->first('kssn_bdg_keahlian_dg_matkul') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan bukti kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('matkul_ps_lain') ? 'has-error' : '' }}">
                <label for="matkul_ps_lain">Mata Kuliah yang Diampu pada PS Lain</label>
                <input type="text" id="matkul_ps_lain" name="matkul_ps_lain" class="form-control" value="{{ old('matkul_ps_lain', isset($m_3a_1_dosen_tetap_pt) ? $m_3a_1_dosen_tetap_pt->matkul_ps_lain : '') }}">
                @if($errors->has('matkul_ps_lain'))
                    <p class="help-block">
                        {{ $errors->first('matkul_ps_lain') }}
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