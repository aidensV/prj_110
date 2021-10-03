@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Produk DTPS Mahasiswa
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8f3_produk_dtps_mhs.update", [$m_8f3_produk_dtps_mhs->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('nama_mahasiswa') ? 'has-error' : '' }}">
                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa', isset($m_8f3_produk_dtps_mhs) ? $m_8f3_produk_dtps_mhs->nama_mahasiswa : '') }}">
                @if($errors->has('nama_mahasiswa'))
                    <p class="help-block">
                        {{ $errors->first('nama_mahasiswa') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('nama_produk') ? 'has-error' : '' }}">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="{{ old('nama_produk', isset($m_8f3_produk_dtps_mhs) ? $m_8f3_produk_dtps_mhs->nama_produk : '') }}">
                @if($errors->has('nama_produk'))
                    <p class="help-block">
                        {{ $errors->first('nama_produk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('deskripsi_produk') ? 'has-error' : '' }}">
                <label for="deskripsi_produk">Deskripsi Produk</label>
                <input type="text" id="deskripsi_produk" name="deskripsi_produk" class="form-control" value="{{ old('deskripsi_produk', isset($m_8f3_produk_dtps_mhs) ? $m_8f3_produk_dtps_mhs->deskripsi_produk : '') }}">
                @if($errors->has('deskripsi_produk'))
                    <p class="help-block">
                        {{ $errors->first('deskripsi_produk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('bukti') ? 'has-error' : '' }}">
                <label for="bukti">Bukti</label>
                <input type="text" id="bukti" name="bukti" class="form-control" value="{{ old('bukti', isset($m_8f3_produk_dtps_mhs) ? $m_8f3_produk_dtps_mhs->bukti : '') }}">
                @if($errors->has('bukti'))
                    <p class="help-block">
                        {{ $errors->first('bukti') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_8f3_produk_dtps_mhs) ? $m_8f3_produk_dtps_mhs->tahun : '') }}">
                @if($errors->has('tahun'))
                    <p class="help-block">
                        {{ $errors->first('tahun') }}
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