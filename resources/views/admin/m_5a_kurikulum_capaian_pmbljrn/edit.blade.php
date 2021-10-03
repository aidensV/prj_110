@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    Kurikulum Capaian Pembelajaran
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_5a_kurikulum_capaian_pmbljrn.update", [$m_5a_kurikulum_capaian_pmbljrn->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'semester') ? 'has-error' : '' }}">
                <label for="semester">Semester</label>
                <input type="text" id="semester" name="semester" class="form-control" value="{{ old('semester', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->semester : '') }}">
                @if($errors->has('semester'))
                    <p class="help-block">
                        {{ $errors->first('semester') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Semester 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'kode_matkul') ? 'has-error' : '' }}">
                <label for="kode_matkul">Kode Matkul</label>
                <input type="text" id="kode_matkul" name="kode_matkul" class="form-control" value="{{ old('kode_matkul', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->kode_matkul : '') }}">
                @if($errors->has('kode_matkul'))
                    <p class="help-block">
                        {{ $errors->first('kode_matkul') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Kode Matkul
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nama_matkul') ? 'has-error' : '' }}">
                <label for="nama_matkul">Nama Matkul</label>
                <input type="text" id="nama_matkul" name="nama_matkul" class="form-control" value="{{ old('nama_matkul', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->nama_matkul : '') }}">
                @if($errors->has('nama_matkul'))
                    <p class="help-block">
                        {{ $errors->first('nama_matkul') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Matkul
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'matkul_kompetensi') ? 'has-error' : '' }}">
                <label for="matkul_kompetensi">Matkul Kompetensi</label>
                <input type="text" id="matkul_kompetensi" name="matkul_kompetensi" class="form-control" value="{{ old('matkul_kompetensi', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->matkul_kompetensi : '') }}">
                @if($errors->has('matkul_kompetensi'))
                    <p class="help-block">
                        {{ $errors->first('matkul_kompetensi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Matkul Kompetensi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_kredit_kuliah') ? 'has-error' : '' }}">
                <label for="bobot_kredit_kuliah">Bobot Kredit Kuliah</label>
                <input type="text" id="bobot_kredit_kuliah" name="bobot_kredit_kuliah" class="form-control" value="{{ old('bobot_kredit_kuliah', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_kuliah : '') }}">
                @if($errors->has('bobot_kredit_kuliah'))
                    <p class="help-block">
                        {{ $errors->first('bobot_kredit_kuliah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bobot Kredit Kuliah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_kredit_seminar') ? 'has-error' : '' }}">
                <label for="bobot_kredit_seminar">Bobot Kredit Seminar</label>
                <input type="text" id="bobot_kredit_seminar" name="bobot_kredit_seminar" class="form-control" value="{{ old('bobot_kredit_seminar', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_seminar : '') }}">
                @if($errors->has('bobot_kredit_seminar'))
                    <p class="help-block">
                        {{ $errors->first('bobot_kredit_seminar') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bobot Kredit Seminar
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bobot_kredit_praktikum') ? 'has-error' : '' }}">
                <label for="bobot_kredit_praktikum">Bobot Kredit Praktikum</label>
                <input type="text" id="bobot_kredit_praktikum" name="bobot_kredit_praktikum" class="form-control" value="{{ old('bobot_kredit_praktikum', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->bobot_kredit_praktikum : '') }}">
                @if($errors->has('bobot_kredit_praktikum'))
                    <p class="help-block">
                        {{ $errors->first('bobot_kredit_praktikum') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bobot Kredit Praktikum
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'konversi_kredit_ke_jam') ? 'has-error' : '' }}">
                <label for="konversi_kredit_ke_jam">Konversi Kredit Ke jam</label>
                <input type="text" id="konversi_kredit_ke_jam" name="konversi_kredit_ke_jam" class="form-control" value="{{ old('konversi_kredit_ke_jam', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->konversi_kredit_ke_jam : '') }}">
                @if($errors->has('konversi_kredit_ke_jam'))
                    <p class="help-block">
                        {{ $errors->first('konversi_kredit_ke_jam') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Konversi Kredit Ke jam
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'capaian_pembelajaran_sikap') ? 'has-error' : '' }}">
                <label for="capaian_pembelajaran_sikap">Capaian Pembelajaran Sikap</label>
                <input type="text" id="capaian_pembelajaran_sikap" name="capaian_pembelajaran_sikap" class="form-control" value="{{ old('capaian_pembelajaran_sikap', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_sikap : '') }}">
                @if($errors->has('capaian_pembelajaran_sikap'))
                    <p class="help-block">
                        {{ $errors->first('capaian_pembelajaran_sikap') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Capaian Pembelajaran Sikap
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'capaian_pembelajaran_pengetahuan') ? 'has-error' : '' }}">
                <label for="capaian_pembelajaran_pengetahuan">Capaian Pembelajaran Pengetahuan</label>
                <input type="text" id="capaian_pembelajaran_pengetahuan" name="capaian_pembelajaran_pengetahuan" class="form-control" value="{{ old('capaian_pembelajaran_pengetahuan', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_pengetahuan : '') }}">
                @if($errors->has('capaian_pembelajaran_pengetahuan'))
                    <p class="help-block">
                        {{ $errors->first('capaian_pembelajaran_pengetahuan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Capaian Pembelajaran Pengetahuan
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'capaian_pembelajaran_keterampilan_umum') ? 'has-error' : '' }}">
                <label for="capaian_pembelajaran_keterampilan_umum">Capaian Pembelajaran Keterampilan Umum</label>
                <input type="text" id="capaian_pembelajaran_keterampilan_umum" name="capaian_pembelajaran_keterampilan_umum" class="form-control" value="{{ old('capaian_pembelajaran_keterampilan_umum', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_umum : '') }}">
                @if($errors->has('capaian_pembelajaran_keterampilan_umum'))
                    <p class="help-block">
                        {{ $errors->first('capaian_pembelajaran_keterampilan_umum') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Capaian Pembelajaran Keterampilan Umum
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'capaian_pembelajaran_keterampilan_khusus') ? 'has-error' : '' }}">
                <label for="capaian_pembelajaran_keterampilan_khusus">Capaian Pembelajaran Keterampilan Khusus</label>
                <input type="text" id="capaian_pembelajaran_keterampilan_khusus" name="capaian_pembelajaran_keterampilan_khusus" class="form-control" value="{{ old('capaian_pembelajaran_keterampilan_khusus', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->capaian_pembelajaran_keterampilan_khusus : '') }}">
                @if($errors->has('capaian_pembelajaran_keterampilan_khusus'))
                    <p class="help-block">
                        {{ $errors->first('capaian_pembelajaran_keterampilan_khusus') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Capaian Pembelajaran Keterampilan Khusus
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'dokummen_rencana_pembelajaran') ? 'has-error' : '' }}">
                <label for="dokummen_rencana_pembelajaran">Dokumen Rencana Pembelajaran</label>
                <input type="text" id="dokummen_rencana_pembelajaran" name="dokummen_rencana_pembelajaran" class="form-control" value="{{ old('dokummen_rencana_pembelajaran', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->dokummen_rencana_pembelajaran : '') }}">
                @if($errors->has('dokummen_rencana_pembelajaran'))
                    <p class="help-block">
                        {{ $errors->first('dokummen_rencana_pembelajaran') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Dokumen Rencana Pembelajaran
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'unit_penyelenggara') ? 'has-error' : '' }}">
                <label for="unit_penyelenggara">Unit Penyelenggara</label>
                <input type="text" id="unit_penyelenggara" name="unit_penyelenggara" class="form-control" value="{{ old('unit_penyelenggara', isset($m_5a_kurikulum_capaian_pmbljrn) ? $m_5a_kurikulum_capaian_pmbljrn->unit_penyelenggara : '') }}">
                @if($errors->has('unit_penyelenggara'))
                    <p class="help-block">
                        {{ $errors->first('unit_penyelenggara') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Unit Penyelenggara
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