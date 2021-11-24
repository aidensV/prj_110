@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Elemen LED
        </div>

        <div class="card-body">
            <form action="{{ route('admin.r_elemen_led.update', [$elemen_led->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('kriteria') ? 'has-error' : '' }}">
                    <label for="kriteria">Kriteria</label>
                    <input type="text" id="kriteria" name="kriteria" class="form-control"
                        value="{{ old('kriteria', isset($elemen_led) ? $elemen_led->kriteria : '') }}">
                    @if ($errors->has('kriteria'))
                        <p class="help-block">
                            {{ $errors->first('kriteria') }}
                        </p>
                    @endif
                    <!-- <p class="helper-block">
                        Isikan Indikator 
                    </p> -->
                </div>
                <div id="row_index">
                @foreach ($elemen_led->detail as $key => $item)

                    
                
                    <div class="row" id="row_{{ $item->id }}">
                        <input type="hidden"  name="id_detail[]" value="{{ $item->id }}"
                        class="form-control">
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
                                <label for="bobot">{{ trans('Skor') }}<span class="text-danger">*</span></label>
                                <input type="text" id="bobot" name="bobot[]" value="{{ $item->bobot }}"
                                    class="form-control">
                                @if ($errors->has('bobot'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('bobot') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                                <label for="deskripsi">{{ trans('Deskripsi') }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" id="deskripsi" name="deskripsi[]" value="{{ $item->deskripsi }}"
                                    class="form-control">
                                @if ($errors->has('deskripsi'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('deskripsi') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group {{ $errors->has('tim_mengajar') ? 'has-error' : '' }}">
                                <label for="tim_mengajar">Aksi</label>
                                @if ($key == 0)
                                    <button type="button" class="form-control btn btn-sm btn-primary add_elemen_led" onclick="addRow()">Tambah</button>
                                    @else
                                        <button type="button" class="form-control btn btn-sm btn-danger" onclick="deleteRow('{{$item->id}}')">Hapus</button>
                                @endif
                                @if ($errors->has('tim_mengajar'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('tim_mengajar') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
                <div>
                    <div>
                        <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function deleteRow(id) {
            $('#row_'+id).remove();
        }

        function addRow() {
            var idx = Math.random().toString(16).slice(2);
            $('#row_index').append(`<div class="row" id="row_`+idx+`">
                        <div class="col-6">
                            <div class="form-group {{ $errors->has('bobot') ? 'has-error' : '' }}">
                                <label for="bobot">{{ trans('Skor') }}<span class="text-danger">*</span></label>
                                <input type="text" id="bobot" name="bobot[]" value="0"
                                    class="form-control">
                                @if ($errors->has('bobot'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('bobot') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}">
                                <label for="deskripsi">{{ trans('Deskripsi') }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" id="deskripsi" name="deskripsi[]" value=""
                                    class="form-control">
                                @if ($errors->has('deskripsi'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('deskripsi') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group {{ $errors->has('tim_mengajar') ? 'has-error' : '' }}">
                                <label for="tim_mengajar">Aksi</label>
                                
                                        <button type="button" class="form-control btn btn-sm btn-danger" onclick="deleteRow('`+idx+`')">Hapus</button>
                                
                                @if ($errors->has('tim_mengajar'))
                                    <p class="help-block text-danger mt-2">
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        {{ $errors->first('tim_mengajar') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>`);
        }
    </script>
@endsection