@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Karya Ilmiah Mahasiswa yang Disitasi
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8f2_kry_ilmiah_mhs_dsts.update", [$m_8f2_kry_ilmiah_mhs_dsts->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('nama_mahasiswa') ? 'has-error' : '' }}">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', isset($m_8f2_kry_ilmiah_mhs_dsts) ? $m_8f2_kry_ilmiah_mhs_dsts->nama_mahasiswa : '') }}">
                @if($errors->has('nama_mahasiswa'))
                    <p class="help-block">
                        {{ $errors->first('nama_mahasiswa') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('judul_artikel_yang_disitasi') ? 'has-error' : '' }}">
                <label for="judul_artikel_yang_disitasi">Judul Artikel yang Disitasi</label>
                <input type="text" id="judul_artikel_yang_disitasi" name="judul_artikel_yang_disitasi" class="form-control" value="{{ old('judul_artikel_yang_disitasi', isset($m_8f2_kry_ilmiah_mhs_dsts) ? $m_8f2_kry_ilmiah_mhs_dsts->judul_artikel_yang_disitasi : '') }}">
                @if($errors->has('judul_artikel_yang_disitasi'))
                    <p class="help-block">
                        {{ $errors->first('judul_artikel_yang_disitasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jumlah_sitasi') ? 'has-error' : '' }}">
                <label for="jumlah_sitasi">Jumlah Sitasi</label>
                <input type="text" id="jumlah_sitasi" name="jumlah_sitasi" class="form-control" value="{{ old('jumlah_sitasi', isset($m_8f2_kry_ilmiah_mhs_dsts) ? $m_8f2_kry_ilmiah_mhs_dsts->jumlah_sitasi : '') }}">
                @if($errors->has('jumlah_sitasi'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_sitasi') }}
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