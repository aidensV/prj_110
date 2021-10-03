@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        EWMP Dosen Tetap PT
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3a3_ewmp_dosen_tetap_pt.update", [$m_3a3_ewmp_dosen_tetap_pt->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'dtps') ? 'has-error' : '' }}">
                <label for="dtps">DTPS</label>
                <input type="text" id="dtps" name="dtps" class="form-control" value="{{ old('dtps', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->dtps : '') }}">
                @if($errors->has('dtps'))
                    <p class="help-block">
                        {{ $errors->first('dtps') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan DTPS
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'ps_diakreditasi') ? 'has-error' : '' }}">
                <label for="ps_diakreditasi">PS Diakreditasi</label>
                <input type="text" id="ps_diakreditasi" name="ps_diakreditasi" class="form-control" value="{{ old('ps_diakreditasi', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->ps_diakreditasi : '') }}">
                @if($errors->has('ps_diakreditasi'))
                    <p class="help-block">
                        {{ $errors->first('ps_diakreditasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan PS Diakreditasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'ps_lain_dalam_pt') ? 'has-error' : '' }}">
                <label for="ps_lain_dalam_pt">PS Lain Dalam PT</label>
                <input type="text" id="ps_lain_dalam_pt" name="ps_lain_dalam_pt" class="form-control" value="{{ old('ps_lain_dalam_pt', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->ps_lain_dalam_pt : '') }}">
                @if($errors->has('ps_lain_dalam_pt'))
                    <p class="help-block">
                        {{ $errors->first('ps_lain_dalam_pt') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan PS Lain Dalam PT
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'ps_lain_luar_pt') ? 'has-error' : '' }}">
                <label for="ps_lain_luar_pt">PS Lain luar PT</label>
                <input type="text" id="ps_lain_luar_pt" name="ps_lain_luar_pt" class="form-control" value="{{ old('ps_lain_luar_pt', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->ps_lain_luar_pt : '') }}">
                @if($errors->has('ps_lain_luar_pt'))
                    <p class="help-block">
                        {{ $errors->first('ps_lain_luar_pt') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan PS Lain luar PT
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'penelitian') ? 'has-error' : '' }}">
                <label for="penelitian">Penelitian</label>
                <input type="text" id="penelitian" name="penelitian" class="form-control" value="{{ old('penelitian', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->penelitian : '') }}">
                @if($errors->has('penelitian'))
                    <p class="help-block">
                        {{ $errors->first('penelitian') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Penelitian
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'pkm') ? 'has-error' : '' }}">
                <label for="pkm">PKM</label>
                <input type="text" id="pkm" name="pkm" class="form-control" value="{{ old('pkm', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->pkm : '') }}">
                @if($errors->has('pkm'))
                    <p class="help-block">
                        {{ $errors->first('pkm') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan PKM
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tugas_tambahan_penunjang') ? 'has-error' : '' }}">
                <label for="tugas_tambahan_penunjang">Tugas Tambahan Penunjang</label>
                <input type="text" id="tugas_tambahan_penunjang" name="tugas_tambahan_penunjang" class="form-control" value="{{ old('tugas_tambahan_penunjang', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->tugas_tambahan_penunjang : '') }}">
                @if($errors->has('tugas_tambahan_penunjang'))
                    <p class="help-block">
                        {{ $errors->first('tugas_tambahan_penunjang') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tugas Tambahan Penunjang
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah') ? 'has-error' : '' }}">
                <label for="jumlah">Jumlah</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->jumlah : '') }}">
                @if($errors->has('jumlah'))
                    <p class="help-block">
                        {{ $errors->first('jumlah') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'rata_rata_per_semester') ? 'has-error' : '' }}">
                <label for="rata_rata_per_semester">Rata Rata Per Semester</label>
                <input type="text" id="rata_rata_per_semester" name="rata_rata_per_semester" class="form-control" value="{{ old('rata_rata_per_semester', isset($m_3a3_ewmp_dosen_tetap_pt) ? $m_3a3_ewmp_dosen_tetap_pt->rata_rata_per_semester : '') }}">
                @if($errors->has('rata_rata_per_semester'))
                    <p class="help-block">
                        {{ $errors->first('rata_rata_per_semester') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Rata Rata Per Semester
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection