@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Penelitian DTPS Yang Melibatkan Mahasiswa
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_6a_pnltn_dtps_yg_mlbtkn_mhs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_6a_pnltn_dtps_yg_mlbtkn_mhs) ? $m_6a_pnltn_dtps_yg_mlbtkn_mhs->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tema_penelitian_sesuai_roadmap') ? 'has-error' : '' }}">
                <label for="tema_penelitian_sesuai_roadmap">Tema Penelitian Sesuai Roadmap</label>
                <input type="text" id="tema_penelitian_sesuai_roadmap" name="tema_penelitian_sesuai_roadmap" class="form-control" value="{{ old('tema_penelitian_sesuai_roadmap', isset($m_6a_pnltn_dtps_yg_mlbtkn_mhs) ? $m_6a_pnltn_dtps_yg_mlbtkn_mhs->vtema_penelitian_sesuai_roadmap : '') }}">
                @if($errors->has('tema_penelitian_sesuai_roadmap'))
                    <p class="help-block">
                        {{ $errors->first('tema_penelitian_sesuai_roadmap') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tema Penelitian Sesuai Roadmap
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nama_mahasiswa') ? 'has-error' : '' }}">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', isset($m_6a_pnltn_dtps_yg_mlbtkn_mhs) ? $m_6a_pnltn_dtps_yg_mlbtkn_mhs->nama_mahasiswa : '') }}">
                @if($errors->has('nama_mahasiswa'))
                    <p class="help-block">
                        {{ $errors->first('nama_mahasiswa') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Mahasiswa
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'judul_kegiatan') ? 'has-error' : '' }}">
                <label for="judul_kegiatan">Judul Kegiatan</label>
                <input type="text" id="judul_kegiatan" name="judul_kegiatan" class="form-control" value="{{ old('judul_kegiatan', isset($m_6a_pnltn_dtps_yg_mlbtkn_mhs) ? $m_6a_pnltn_dtps_yg_mlbtkn_mhs->judul_kegiatan : '') }}">
                @if($errors->has('judul_kegiatan'))
                    <p class="help-block">
                        {{ $errors->first('judul_kegiatan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Judul Kegiatan
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_6a_pnltn_dtps_yg_mlbtkn_mhs) ? $m_6a_pnltn_dtps_yg_mlbtkn_mhs->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Tahun
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection
