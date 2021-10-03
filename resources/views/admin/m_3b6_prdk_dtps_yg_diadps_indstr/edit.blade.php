@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Produk DTPS yang Diadopsi Industri
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_3b6_prdk_dtps_yg_diadps_indstr.update", [$m_3b6_prdk_dtps_yg_diadps_indstr->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has( 'nama_dosen') ? 'has-error' : '' }}">
                <label for="nama_dosen">Nama Dosen</label>
                <input type="text" id="nama_dosen" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', isset($m_3b6_prdk_dtps_yg_diadps_indstr) ? $m_3b6_prdk_dtps_yg_diadps_indstr->nama_dosen : '') }}">
                @if($errors->has('nama_dosen'))
                    <p class="help-block">
                        {{ $errors->first('nama_dosen') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Dosen 
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'nama_produk') ? 'has-error' : '' }}">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="{{ old('nama_produk', isset($m_3b6_prdk_dtps_yg_diadps_indstr) ? $m_3b6_prdk_dtps_yg_diadps_indstr->nama_produk : '') }}">
                @if($errors->has('nama_produk'))
                    <p class="help-block">
                        {{ $errors->first('nama_produk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Nama Produk
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'deskripsi_produk') ? 'has-error' : '' }}">
                <label for="deskripsi_produk">Deskripsi Produk</label>
                <input type="text" id="deskripsi_produk" name="deskripsi_produk" class="form-control" value="{{ old('deskripsi_produk', isset($m_3b6_prdk_dtps_yg_diadps_indstr) ? $m_3b6_prdk_dtps_yg_diadps_indstr->deskripsi_produk : '') }}">
                @if($errors->has('deskripsi_produk'))
                    <p class="help-block">
                        {{ $errors->first('deskripsi_produk') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Deskripsi Produk
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'bukti') ? 'has-error' : '' }}">
                <label for="bukti">Bukti</label>
                <input type="text" id="bukti" name="bukti" class="form-control" value="{{ old('bukti', isset($m_3b6_prdk_dtps_yg_diadps_indstr) ? $m_3b6_prdk_dtps_yg_diadps_indstr->bukti : '') }}">
                @if($errors->has('bukti'))
                    <p class="help-block">
                        {{ $errors->first('bukti') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Bukti
                </p> -->
            </div>
            <div class="form-group {{ $errors->has( 'tahun') ? 'has-error' : '' }}">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{ old('tahun', isset($m_3b6_prdk_dtps_yg_diadps_indstr) ? $m_3b6_prdk_dtps_yg_diadps_indstr->tahun : '') }}">
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
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection