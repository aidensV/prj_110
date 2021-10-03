@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Karya Ilmiah DTPS yang Disitasi
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_3b5_krya_ilmiah_dtps_yg_dstasi.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3b5_krya_ilmiah_dtps_yg_dstasi) ? $m_3b5_krya_ilmiah_dtps_yg_dstasi->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'judul_artikel_yang_disitasi') ? 'has-error' : '' }}">
                <label for="judul_artikel_yang_disitasi">Judul Artikel yang Disitasi</label>
                <input type="text" id="judul_artikel_yang_disitasi" name="judul_artikel_yang_disitasi" class="form-control" value="{{ old('judul_artikel_yang_disitasi', isset($m_3b5_krya_ilmiah_dtps_yg_dstasi) ? $m_3b5_krya_ilmiah_dtps_yg_dstasi->judul_artikel_yang_disitasi : '') }}">
                @if($errors->has('judul_artikel_yang_disitasi'))
                    <p class="help-block">
                        {{ $errors->first('judul_artikel_yang_disitasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Judul Artikel yang Disitasi
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'jumlah_sitasi') ? 'has-error' : '' }}">
                <label for="jumlah_sitasi">Jumlah Sitasi</label>
                <input type="text" id="jumlah_sitasi" name="jumlah_sitasi" class="form-control" value="{{ old('jumlah_sitasi', isset($m_3b5_krya_ilmiah_dtps_yg_dstasi) ? $m_3b5_krya_ilmiah_dtps_yg_dstasi->jumlah_sitasi : '') }}">
                @if($errors->has('jumlah_sitasi'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_sitasi') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Jumlah Sitasi
                </p> -->
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection