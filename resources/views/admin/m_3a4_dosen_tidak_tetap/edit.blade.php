@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Tidak Tetap
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3a4_dosen_tidak_tetap.update", [$m_3a4_dosen_tidak_tetap->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nidn_nidk') ? 'has-error' : '' }}">
                <label for="nidn_nidk">NIDN NIDK</label>
                <input type="text" id="nidn_nidk" name="nidn_nidk" class="form-control" value="{{ old('nidn_nidk', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->nidn_nidk : '') }}">
                @if($errors->has('nidn_nidk'))
                    <p class="help-block">
                        {{ $errors->first('nidn_nidk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan NIDN NIDK
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'pendidikan_pasca_sarjana') ? 'has-error' : '' }}">
                <label for="pendidikan_pasca_sarjana">Pendidikan Pasca Sarjana</label>
                <input type="text" id="pendidikan_pasca_sarjana" name="pendidikan_pasca_sarjana" class="form-control" value="{{ old('pendidikan_pasca_sarjana', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->pendidikan_pasca_sarjana : '') }}">
                @if($errors->has('pendidikan_pasca_sarjana'))
                    <p class="help-block">
                        {{ $errors->first('pendidikan_pasca_sarjana') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Pendidikan Pasca Sarjana
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bidang_keahlian') ? 'has-error' : '' }}">
                <label for="bidang_keahlian">Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->bidang_keahlian : '') }}">
                @if($errors->has('bidang_keahlian'))
                    <p class="help-block">
                        {{ $errors->first('bidang_keahlian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bidang Keahlian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jabatan_akademik') ? 'has-error' : '' }}">
                <label for="jabatan_akademik">Jabatan Akademik</label>
                <input type="text" id="jabatan_akademik" name="jabatan_akademik" class="form-control" value="{{ old('jabatan_akademik', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->jabatan_akademik : '') }}">
                @if($errors->has('jabatan_akademik'))
                    <p class="help-block">
                        {{ $errors->first('jabatan_akademik') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jabatan Akademik
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'sertifikat_pendidik_profesional') ? 'has-error' : '' }}">
                <label for="sertifikat_pendidik_profesional">Sertifikat Pendidik Profesional</label>
                <input type="text" id="sertifikat_pendidik_profesional" name="sertifikat_pendidik_profesional" class="form-control" value="{{ old('sertifikat_pendidik_profesional', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->sertifikat_pendidik_profesional : '') }}">
                @if($errors->has('sertifikat_pendidik_profesional'))
                    <p class="help-block">
                        {{ $errors->first('sertifikat_pendidik_profesional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Sertifikat Pendidik Profesional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'sertifikat_kompetensi_profesi_industri') ? 'has-error' : '' }}">
                <label for="sertifikat_kompetensi_profesi_industri">Sertifikat Kompetensi Profesi Industri</label>
                <input type="text" id="sertifikat_kompetensi_profesi_industri" name="sertifikat_kompetensi_profesi_industri" class="form-control" value="{{ old('sertifikat_kompetensi_profesi_industri', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->sertifikat_kompetensi_profesi_industri : '') }}">
                @if($errors->has('sertifikat_kompetensi_profesi_industri'))
                    <p class="help-block">
                        {{ $errors->first('sertifikat_kompetensi_profesi_industri') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Sertifikat Kompetensi Profesi Industri
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'matkul_ps_akreditasi') ? 'has-error' : '' }}">
                <label for="matkul_ps_akreditasi">Matkul PS Akreditasi</label>
                <input type="text" id="matkul_ps_akreditasi" name="matkul_ps_akreditasi" class="form-control" value="{{ old('matkul_ps_akreditasi', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->matkul_ps_akreditasi : '') }}">
                @if($errors->has('matkul_ps_akreditasi'))
                    <p class="help-block">
                        {{ $errors->first('matkul_ps_akreditasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Matkul PS Akreditasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'kesesuaian_dengan_matkul') ? 'has-error' : '' }}">
                <label for="kesesuaian_dengan_matkul">Kesesuaian Dengan Matkul</label>
                <input type="text" id="kesesuaian_dengan_matkul" name="kesesuaian_dengan_matkul" class="form-control" value="{{ old('kesesuaian_dengan_matkul', isset($m_3a4_dosen_tidak_tetap) ? $m_3a4_dosen_tidak_tetap->kesesuaian_dengan_matkul : '') }}">
                @if($errors->has('kesesuaian_dengan_matkul'))
                    <p class="help-block">
                        {{ $errors->first('kesesuaian_dengan_matkul') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Kesesuaian Dengan Matkul
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection