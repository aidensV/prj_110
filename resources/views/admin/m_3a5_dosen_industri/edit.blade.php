@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Dosen Industri
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3a5_dosen_industri.update", [$m_3a5_dosen_industri->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'nama_dosen_industri') ? 'has-error' : '' }}">
                <label for="nama_dosen_industri">Nama Dosen Industri</label>
                <input type="text" id="nama_dosen_industri" name="nama_dosen_industri" class="form-control" value="{{ old('nama_dosen_industri', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->nama_dosen_industri : '') }}">
                @if($errors->has('nama_dosen_industri'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen_industri') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen Industri
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nidk') ? 'has-error' : '' }}">
                <label for="nidk">NIDK</label>
                <input type="text" id="nidk" name="nidk" class="form-control" value="{{ old('nidk', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->nidk : '') }}">
                @if($errors->has('nidk'))
                    <p class="help-block">
                        {{ $errors->first('nidk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan NIDK
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'perusahaan') ? 'has-error' : '' }}">
                <label for="perusahaan">Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" class="form-control" value="{{ old('perusahaan', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->perusahaan : '') }}">
                @if($errors->has('perusahaan'))
                    <p class="help-block">
                        {{ $errors->first('perusahaan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Perusahaan
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'pendidikan_tertinggi') ? 'has-error' : '' }}">
                <label for="pendidikan_tertinggi">Pendidikan Tertinggi</label>
                <input type="text" id="pendidikan_tertinggi" name="pendidikan_tertinggi" class="form-control" value="{{ old('pendidikan_tertinggi', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->pendidikan_tertinggi : '') }}">
                @if($errors->has('pendidikan_tertinggi'))
                    <p class="help-block">
                        {{ $errors->first('pendidikan_tertinggi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Pendidikan Tertinggi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bidang_keahlian') ? 'has-error' : '' }}">
                <label for="bidang_keahlian">Bidang Keahlian</label>
                <input type="text" id="bidang_keahlian" name="bidang_keahlian" class="form-control" value="{{ old('bidang_keahlian', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->bidang_keahlian : '') }}">
                @if($errors->has('bidang_keahlian'))
                    <p class="help-block">
                        {{ $errors->first('bidang_keahlian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bidang Keahlian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'sertifikat_profesi') ? 'has-error' : '' }}">
                <label for="sertifikat_profesi">Sertifikat Profesi</label>
                <input type="text" id="sertifikat_profesi" name="sertifikat_profesi" class="form-control" value="{{ old('sertifikat_profesi', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->sertifikat_profesi : '') }}">
                @if($errors->has('sertifikat_profesi'))
                    <p class="help-block">
                        {{ $errors->first('sertifikat_profesi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Sertifikat Profesi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'mata_kuliah') ? 'has-error' : '' }}">
                <label for="mata_kuliah">Mata Kuliah</label>
                <input type="text" id="mata_kuliah" name="mata_kuliah" class="form-control" value="{{ old('mata_kuliah', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->mata_kuliah : '') }}">
                @if($errors->has('mata_kuliah'))
                    <p class="help-block">
                        {{ $errors->first('mata_kuliah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Mata Kuliah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_kredit') ? 'has-error' : '' }}">
                <label for="bobot_kredit">Bobot Kredit</label>
                <input type="text" id="bobot_kredit" name="bobot_kredit" class="form-control" value="{{ old('bobot_kredit', isset($m_3a5_dosen_industri) ? $m_3a5_dosen_industri->bobot_kredit : '') }}">
                @if($errors->has('bobot_kredit'))
                    <p class="help-block">
                        {{ $errors->first('bobot_kredit') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bobot Kredit
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection