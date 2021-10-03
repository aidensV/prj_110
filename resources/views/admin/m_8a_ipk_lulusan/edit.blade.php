@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        IPK LULUSAN
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_8a_ipk_lulusan.update", [$m_8a_ipk_lulusan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="form-group {{ $errors->has('tahun_lulus') ? 'has-error' : '' }}">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="text" id="tahun_lulus" name="tahun_lulus" class="form-control" value="{{ old('tahun_lulus', isset($m_8a_ipk_lulusan) ? $m_8a_ipk_lulusan->tahun_lulus : '') }}">
                @if($errors->has('tahun_lulus'))
                    <p class="help-block">
                        {{ $errors->first('tahun_lulus') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan lembaga mitra
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('jumlah_lulusan') ? 'has-error' : '' }}">
                <label for="jumlah_lulusan">Jumlah Lulusan</label>
                <input type="text" id="jumlah_lulusan" name="jumlah_lulusan" class="form-control" value="{{ old('jumlah_lulusan', isset($m_8a_ipk_lulusan) ? $m_8a_ipk_lulusan->jumlah_lulusan : '') }}">
                @if($errors->has('jumlah_lulusan'))
                    <p class="help-block">
                        {{ $errors->first('jumlah_lulusan') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat internasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ipk_min') ? 'has-error' : '' }}">
                <label for="ipk_min">IPK Minimum</label>
                <input type="text" id="ipk_min" name="ipk_min" class="form-control" value="{{ old('ipk_min', isset($m_8a_ipk_lulusan) ? $m_8a_ipk_lulusan->ipk_min : '') }}">
                @if($errors->has('ipk_min'))
                    <p class="help-block">
                        {{ $errors->first('ipk_min') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat nasional
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ipk_rata_rata') ? 'has-error' : '' }}">
                <label for="ipk_rata_rata">IPK Rata-rata</label>
                <input type="text" id="ipk_rata_rata" name="ipk_rata_rata" class="form-control" value="{{ old('ipk_rata_rata', isset($m_8a_ipk_lulusan) ? $m_8a_ipk_lulusan->ipk_rata_rata : '') }}">
                @if($errors->has('ipk_rata_rata'))
                    <p class="help-block">
                        {{ $errors->first('ipk_rata_rata') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    isikan kerjasama tingkat wilayah
                </p> -->
            </div>
            <div class="form-group {{ $errors->has('ipk_maks') ? 'has-error' : '' }}">
                <label for="ipk_maks">Mahasiswa yg di bimbing PS lain TS2</label>
                <input type="text" id="ipk_maks" name="ipk_maks" class="form-control" value="{{ old('ipk_maks', isset($m_8a_ipk_lulusan) ? $m_8a_ipk_lulusan->ipk_maks : '') }}">
                @if($errors->has('ipk_maks'))
                    <p class="help-block">
                        {{ $errors->first('ipk_maks') }}
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