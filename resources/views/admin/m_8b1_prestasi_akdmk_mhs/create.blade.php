@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Prestasi Non Akademik Mahasiswa
    </div>
    
    <div class="card-body">
        <form action="{{ route("admin.r_8b2_prestasi_nonakdmk_mhs.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nama_kegiatan') ? 'has-error' : '' }}">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" value="{{ old('nama_kegiatan', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->nama_kegiatan : '') }}">
                @if($errors->has('nama_kegiatan'))
                    <p class="help-block">
                        {{ $errors->first('nama_kegiatan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('waktu_perolehan') ? 'has-error' : '' }}">
                <label for="waktu_perolehan">Waktu Perolehan</label>
                <input type="text" id="waktu_perolehan" name="waktu_perolehan" class="form-control" value="{{ old('waktu_perolehan', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->waktu_perolehan : '') }}">
                @if($errors->has('waktu_perolehan'))
                    <p class="help-block">
                        {{ $errors->first('waktu_perolehan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_lokal') ? 'has-error' : '' }}">
                <label for="tingkat_lokal">Tingkat Lokal</label>
                <input type="text" id="tingkat_lokal" name="tingkat_lokal" class="form-control" value="{{ old('tingkat_lokal', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->tingkat_lokal : '') }}">
                @if($errors->has('tingkat_lokal'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_lokal') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('tingkat_nasional') ? 'has-error' : '' }}">
                <label for="tingkat_nasional">Tingkat Nasional</label>
                <input type="text" id="tingkat_nasional" name="tingkat_nasional" class="form-control" value="{{ old('tingkat_nasional', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->tingkat_nasional : '') }}">
                @if($errors->has('tingkat_nasional'))
                    <p class="help-block">
                        {{ $errors->first('tingkat_nasional') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('prestasi_yang_dicapai') ? 'has-error' : '' }}">
                <label for="prestasi_yang_dicapai">Mahasiswa yg di bimbing PS lain TS2</label>
                <input type="text" id="prestasi_yang_dicapai" name="prestasi_yang_dicapai" class="form-control" value="{{ old('prestasi_yang_dicapai', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->prestasi_yang_dicapai : '') }}">
                @if($errors->has('prestasi_yang_dicapai'))
                    <p class="help-block">
                        {{ $errors->first('prestasi_yang_dicapai') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('prestasi_yang_dicapai') ? 'has-error' : '' }}">
                <label for="prestasi_yang_dicapai">Prestasi yang dicapai</label>
                <input type="text" id="prestasi_yang_dicapai" name="prestasi_yang_dicapai" class="form-control" value="{{ old('prestasi_yang_dicapai', isset($m_8b2_prestasi_nonakdmk_mhs) ? $m_8b2_prestasi_nonakdmk_mhs->prestasi_yang_dicapai : '') }}">
                @if($errors->has('prestasi_yang_dicapai'))
                    <p class="help-block">
                        {{ $errors->first('prestasi_yang_dicapai') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan judul kegiatan kerjasama
                </p> -->
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection