@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        LED
    </div>

    <div class="card-body">
    <form action="{{ route("admin.r_led.update", [$m_led->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('elemen_led') ? 'has-error' : '' }}">
                <label for="elemen_led">LED<span class="text-danger">*</span></label>
                <select class="form-control select2 {{ $errors->has('elemen_led') ? 'is-invalid' : '' }}" name="elemen_led" id="elemen_led" required>
                    <option value disabled {{ old('elemen_led', null) === null ? 'selected' : '' }}>{{ trans('id.silahkanPilih') }}</option>
                    @foreach($elemen_led as $key => $label)
                        <option value="{{ $key }}" {{ $m_led->elemen_led == (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('elemen_led'))
                    <p class="help-block text-danger mt-2">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('elemen_led') }}
                    </p>
                @endif
               
            </div>
            <div class="form-group {{ $errors->has('ket') ? 'has-error' : '' }}">
                <label for="ket">Keterangan*</label>
                <p class="helper-block text-muted">
                </p>
                <input type="text" id="ket" name="ket" class="form-control" value="{{ old('ket', isset($m_led) ? $m_led->ket : '') }}">
                @if($errors->has('ket'))
                    <p class="help-block text-danger mt-2">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('ket') }}
                    </p>
                @endif
            </div>
            <div class="d-none">
                <label for="nilai">Nilai*</label>
                <input type="text" id="nilai" name="nilai" class="form-control" value="{{ old('nilai', isset($m_led) ? $m_led->nilai : '') }}">
                @if($errors->has('nilai'))
                    <p class="help-block text-danger mt-2">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i> {{ $errors->first('nilai') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('penjelasan') ? 'has-error' : '' }}">
                    <label for="semester">File SK<span class="text-danger"><span class="text-danger">*</span></span></label>
                    <div class="custom-file">
                        <input name="penjelasan" id="file-upload" onclick="change_fileName(this)" type="file" class="custom-file-input @error('file') is-invalid @enderror" aria-describedby="inputGroupFile01" lang="in">
                        <label class="custom-file-label" for="file">{{$m_led->penjelasan}}</label>
                    </div>
                    @if($errors->has('penjelasan'))
                    <p class="help-block text-danger">
                        <strong>{{ $errors->first('penjelasan') }}</strong>
                    </p>
                    @endif
                </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function change_fileName(input){
    $("#file-upload").on("change", function(){
      // Name of file and placeholder
      var file = this.files[0].name;
      var dflt = $(this).attr("placeholder");
      if($(this).val()!=""){
        $(this).next().text(file);
        var reader = new FileReader();
    reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
      } else {
        $(this).next().text(dflt);
      }
    });
    }
</script>
@endsection

