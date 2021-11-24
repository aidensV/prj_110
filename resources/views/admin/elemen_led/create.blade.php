@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Elemen LED
    </div>

    <div class="card-body">
        <form action="{{ route("admin.r_elemen_led.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="s" name="s" class="form-control" value="{{ request()->get('s') }}">
            <input type="hidden" id="prodi_id" name="prodi_id" class="form-control" value="{{ request()->get('prodi_id') }}">
            <div class="form-group {{ $errors->has( 'kriteria') ? 'has-error' : '' }}">
                <label for="kriteria">Kriteria</label>
                <input type="text" id="kriteria" name="kriteria" class="form-control" value="{{ old('kriteria', isset($elemen_led) ? $elemen_led->kriteria : '') }}">
                @if($errors->has('kriteria'))
                    <p class="help-block">
                        {{ $errors->first('kriteria') }}
                    </p>
                @endif
                <!-- <p class="helper-block">
                    Isikan Indikator 
                </p> -->
            </div>
            <div class="row hdtuto lst increment"  id="div_1">
                <div class="col-6">
                    <div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
                        <label for="bobot">{{ trans('Skor') }}<span class="text-danger">*</span></label>
                        <input type="text" id="bobot" name="bobot[]" class="form-control">
                        @if($errors->has('bobot'))
                            <p class="help-block text-danger mt-2">
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('bobot') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                        <label for="deskripsi">{{ trans('Deskripsi') }}<span class="text-danger">*</span></label>
                        <input type="text" id="deskripsi" name="deskripsi[]" class="form-control">
                        @if($errors->has('deskripsi'))
                            <p class="help-block text-danger mt-2">
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('deskripsi') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-1">
                    <div class="form-group {{ $errors->has('tim_mengajar') ? 'has-error' : '' }}">
                        <label for="tim_mengajar">Aksi</label>
                        <button type="button" class="form-control btn btn-sm btn-primary add_elemen_led">Tambah</buttoon>
                        @if($errors->has('tim_mengajar'))
                            <p class="help-block text-danger mt-2">
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('tim_mengajar') }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div id="div_5">
            
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection